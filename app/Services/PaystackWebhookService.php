<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Handles inbound Paystack webhook events.
 *
 * @see https://paystack.com/docs/payments/webhooks/
 */
class PaystackWebhookService
{
    public function handle(Request $request): ?Booking
    {
        $payload = $request->getContent();
        $signature = $request->header('x-paystack-signature');
        $secret = (string) config('services.paystack.secret_key');

        if ($secret === '' || empty($signature)) {
            return null;
        }

        // Paystack signs the raw body with HMAC SHA512 using the secret key.
        $expected = hash_hmac('sha512', $payload, $secret);

        if (! hash_equals($expected, $signature)) {
            Log::warning('Paystack webhook signature verification failed');

            return null;
        }

        $event = json_decode($payload, true);
        if (! is_array($event)) {
            return null;
        }

        $booking = $this->resolveBooking($event);
        if (! $booking) {
            return null;
        }

        return match (data_get($event, 'event')) {
            'charge.success' => $this->markCompleted($booking, $event),
            'charge.failed', 'transfer.failed' => $this->markFailed($booking),
            default => $booking,
        };
    }

    /**
     * @param  array<string, mixed>  $event
     */
    private function resolveBooking(array $event): ?Booking
    {
        $reference = data_get($event, 'data.reference');
        $bookingRef = data_get($event, 'data.metadata.booking_id');

        $query = Booking::query();

        if (! empty($reference)) {
            $query->where('payment_reference', $reference);
        } elseif (! empty($bookingRef)) {
            $query->where('booking_id', $bookingRef);
        } else {
            return null;
        }

        $booking = $query->first();

        if (! $booking && ! empty($bookingRef)) {
            $booking = Booking::where('booking_id', $bookingRef)->first();
        }

        return $booking;
    }

    /**
     * @param  array<string, mixed>  $event
     */
    private function markCompleted(Booking $booking, array $event): Booking
    {
        // Guard against a tampered or mismatched amount before marking the booking paid.
        $paid = (int) data_get($event, 'data.amount');
        $expected = (int) round((float) $booking->total_amount * 100);

        if ($paid > 0 && $paid < $expected) {
            Log::warning('Paystack underpayment detected', [
                'booking_id' => $booking->booking_id,
                'paid' => $paid,
                'expected' => $expected,
            ]);

            return $booking;
        }

        $booking->update([
            'payment_status' => 'paid',
            'status' => 'completed',
        ]);

        return $booking;
    }

    private function markFailed(Booking $booking): Booking
    {
        $booking->update(['payment_status' => 'failed']);

        return $booking;
    }
}

