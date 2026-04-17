<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayFastIpnService
{
    /**
     * PayFast's known production server IP ranges (CIDR notation).
     * Source: https://developers.payfast.co.za/docs#notify
     * Review this list periodically as PayFast may update their infrastructure.
     */
    private const VALID_IP_RANGES = [
        '197.97.145.144/28',
        '41.74.179.194/27',
    ];

    /**
     * Run all four IPN validation steps in sequence.
     * Short-circuits on the first failure and logs the reason.
     *
     * @return bool  true only when every step passes
     */
    public function validate(Request $request, Booking $booking): bool
    {
        if (!$this->validateSignature($request)) {
            Log::warning('PayFast IPN: signature mismatch', [
                'booking_id' => $request->input('m_payment_id'),
                'ip'         => $request->ip(),
            ]);

            return false;
        }

        if (!$this->validateSourceIp($request)) {
            Log::warning('PayFast IPN: request from untrusted IP', [
                'ip' => $request->ip(),
            ]);

            return false;
        }

        if (!$this->validateAmount($request, $booking)) {
            Log::warning('PayFast IPN: amount mismatch', [
                'booking_id'     => $booking->booking_id,
                'expected'       => $booking->total_amount,
                'received_gross' => $request->input('amount_gross'),
            ]);

            return false;
        }

        if (!$this->validateWithPayFastServers($request)) {
            Log::warning('PayFast IPN: PayFast server-side validation rejected', [
                'booking_id' => $request->input('m_payment_id'),
            ]);

            return false;
        }

        return true;
    }

    /**
     * Step 1 — Signature validation.
     *
     * Reconstruct the MD5 signature from the posted fields (excluding the
     * `signature` field itself) using the same algorithm that was used to sign
     * the outbound request. The field order PayFast sends matters — we iterate
     * in POST arrival order, not sorted alphabetically.
     */
    private function validateSignature(Request $request): bool
    {
        // All posted fields except the signature itself
        $data = array_filter(
            $request->except('signature'),
            fn ($value) => $value !== '' && $value !== null
        );

        $parts = [];
        foreach ($data as $key => $value) {
            $parts[] = $key . '=' . urlencode(trim((string) $value));
        }

        $queryString = implode('&', $parts);

        $passphrase = config('services.payfast.passphrase');
        if (!empty($passphrase)) {
            $queryString .= '&passphrase=' . urlencode(trim($passphrase));
        }

        return hash_equals(md5($queryString), (string) $request->input('signature', ''));
    }

    /**
     * Step 2 — Source IP validation.
     *
     * All legitimate PayFast IPN notifications originate from a known IP range.
     * In sandbox mode this check is skipped because test notifications can come
     * from arbitrary IPs (e.g. your own machine via PayFast's simulator tool).
     */
    private function validateSourceIp(Request $request): bool
    {
        if (config('services.payfast.sandbox')) {
            return true;
        }

        $ip = $request->ip();

        foreach (self::VALID_IP_RANGES as $range) {
            if ($this->ipInCidrRange($ip, $range)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Step 3 — Amount cross-check.
     *
     * Compare the `amount_gross` posted by PayFast against the `total_amount`
     * we stored when the booking was created.  This prevents a replay attack
     * where a completed R1 test transaction is replayed against a R5 000 booking.
     *
     * Floating-point comparison uses a 0.01 epsilon to absorb any tiny rounding
     * differences between PayFast's representation and ours.
     */
    private function validateAmount(Request $request, Booking $booking): bool
    {
        if ($booking->total_amount === null) {
            // No stored amount — this booking predates the total_amount column.
            // Log for ops follow-up but do not hard-block; amount cannot be verified.
            Log::warning('PayFast IPN: amount check skipped — booking has no stored total_amount', [
                'booking_id' => $booking->booking_id,
            ]);

            return true;
        }

        $amountGross = (float) $request->input('amount_gross', 0);

        return abs($amountGross - (float) $booking->total_amount) < 0.01;
    }

    /**
     * Step 4 — Server-side confirmation.
     *
     * Post all received IPN data back to PayFast's validation endpoint.
     * PayFast responds with the plain-text string "VALID" if the notification
     * is genuine, or "INVALID" otherwise.  A network failure is treated as
     * a validation failure; the IPN will be retried by PayFast.
     */
    private function validateWithPayFastServers(Request $request): bool
    {
        $validationUrl = config('services.payfast.sandbox')
            ? 'https://sandbox.payfast.co.za/eng/query/validate'
            : 'https://www.payfast.co.za/eng/query/validate';

        try {
            $response = Http::timeout(15)
                ->withHeaders(['User-Agent' => 'TkacCommerce/PayFast-IPN-Validator'])
                ->asForm()
                ->post($validationUrl, $request->all());

            return trim($response->body()) === 'VALID';
        } catch (\Throwable $e) {
            Log::error('PayFast IPN: server validation HTTP request failed', [
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Determine whether an IPv4 address falls within a given CIDR range.
     */
    private function ipInCidrRange(string $ip, string $cidr): bool
    {
        [$subnet, $prefixLength] = explode('/', $cidr);

        $ipLong     = ip2long($ip);
        $subnetLong = ip2long($subnet);
        $mask       = ~((1 << (32 - (int) $prefixLength)) - 1);

        return ($ipLong & $mask) === ($subnetLong & $mask);
    }
}
