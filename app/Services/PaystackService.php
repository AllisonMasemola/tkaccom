<?php

namespace App\Services;

use App\Models\Accommodation;
use App\Models\Booking;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * Thin wrapper around the Paystack REST API.
 *
 * @see https://paystack.com/docs/api/transaction/
 */
class PaystackService
{
    private string $secretKey;

    private string $baseUrl;

    private string $currency;

    public function __construct()
    {
        $this->secretKey = trim((string) config('services.paystack.secret_key'));
        $this->baseUrl = rtrim((string) config('services.paystack.base_url'), '/');
        $this->currency = strtoupper((string) config('services.paystack.currency'));

        if ($this->secretKey === '') {
            throw new \InvalidArgumentException('Paystack secret key is not configured. Set PAYSTACK_SECRET_KEY in your .env file.');
        }

        if (! Str::startsWith($this->secretKey, ['sk_test_', 'sk_live_'])) {
            throw new \InvalidArgumentException('Paystack secret key appears invalid. Expected a value like sk_test_... or sk_live_....');
        }
    }

    /**
     * Initialise a transaction and return the hosted checkout details.
     *
     * @return array{authorization_url: string, access_code: string, reference: string}
     */
    public function initializeTransaction(Booking $booking, string $callbackUrl): array
    {
        $reference = $this->generateReference($booking);

        $response = $this->client()->post('/transaction/initialize', [
            'email' => $booking->customer_email,
            // Paystack expects the amount in the currency's smallest unit (cents for ZAR).
            'amount' => $this->toMinorUnits((float) $booking->total_amount),
            'currency' => $this->currency,
            'reference' => $reference,
            'callback_url' => $callbackUrl,
            'metadata' => [
                'booking_id' => $booking->booking_id,
                'custom_fields' => [
                    [
                        'display_name' => 'Booking Reference',
                        'variable_name' => 'booking_reference',
                        'value' => $booking->booking_id,
                    ],
                    [
                        'display_name' => 'Item',
                        'variable_name' => 'item',
                        'value' => $this->itemName($booking),
                    ],
                ],
            ],
        ]);

        $body = $response->json();

        if (! $response->successful() || ! data_get($body, 'status')) {
            throw new RuntimeException(
                'Paystack transaction initialisation failed: '.(data_get($body, 'message') ?? $response->body())
            );
        }

        // Persist the reference so the callback and webhook can be tied back to this booking.
        $booking->forceFill(['payment_reference' => $reference])->save();

        return [
            'authorization_url' => (string) data_get($body, 'data.authorization_url'),
            'access_code' => (string) data_get($body, 'data.access_code'),
            'reference' => (string) data_get($body, 'data.reference', $reference),
        ];
    }

    /**
     * Verify a transaction with Paystack. Returns the transaction payload, or null when unverifiable.
     *
     * @return array<string, mixed>|null
     */
    public function verifyTransaction(string $reference): ?array
    {
        $response = $this->client()->get('/transaction/verify/'.rawurlencode($reference));

        $body = $response->json();

        if (! $response->successful() || ! data_get($body, 'status')) {
            return null;
        }

        return data_get($body, 'data');
    }

    /**
     * Paystack requires a globally unique reference per transaction, so a booking that
     * retries after a failed attempt must not reuse its previous reference.
     */
    private function generateReference(Booking $booking): string
    {
        return $booking->booking_id.'-'.strtoupper(Str::random(6));
    }

    private function itemName(Booking $booking): string
    {
        return $booking->bookable instanceof Accommodation
            ? (string) $booking->bookable->name
            : (string) $booking->bookable?->car_name;
    }

    private function toMinorUnits(float $amount): int
    {
        return (int) round($amount * 100);
    }

    private function client(): PendingRequest
    {
        return Http::withToken($this->secretKey)
            ->acceptJson()
            ->asJson()
            ->timeout(30)
            ->baseUrl($this->baseUrl);
    }
}

