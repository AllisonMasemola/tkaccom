<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Prestige;
use Illuminate\Http\Request;

class PayFastController extends Controller
{
    /**
     * Resolve the bookable model from the URL type segment.
     */
    private function resolveBookable(string $type, int $id): Accommodation|Prestige
    {
        return match ($type) {
            'accommodation' => Accommodation::findOrFail($id),
            'prestige'      => Prestige::findOrFail($id),
        };
    }

    /**
     * Generate a PayFast MD5 signature from the data array.
     *
     * Rules from https://developers.payfast.co.za/docs#step_1_create_the_data_string:
     *   1. Iterate params in definition order (do NOT sort).
     *   2. Exclude empty / null values.
     *   3. Encode with urlencode() — spaces become '+', not '%20' (NOT RFC 3986).
     *   4. Append passphrase last if set.
     *   5. MD5 the resulting string.
     */
    private function generateSignature(array $data, ?string $passphrase = null): string
    {
        $parts = [];

        foreach ($data as $key => $value) {
            // Exclude empty optional fields — PayFast treats them as absent
            if ($value === '' || $value === null) {
                continue;
            }

            // urlencode() encodes spaces as '+' which is what PayFast expects
            $parts[] = $key . '=' . urlencode(trim((string) $value));
        }

        $queryString = implode('&', $parts);

        if (!empty($passphrase)) {
            $queryString .= '&passphrase=' . urlencode(trim($passphrase));
        }

        return md5($queryString);
    }

    /**
     * Render the checkout (guest details) page for a bookable entity.
     * This page collects the guest's info before a booking is created.
     */
    public function pay(Request $request, string $type, int $id)
    {
        $bookable = $this->resolveBookable($type, $id);

        return view('checkout', [
            'bookable'     => $bookable,
            'bookableType' => $type,
        ]);
    }

    /**
     * Render the PayFast auto-submit payment page for a confirmed booking.
     *
     * The customer is sent here via the confirmation email. This page builds
     * the PayFast POST form and auto-submits it via JavaScript.
     *
     * @param  string  $bookingRef  Human-readable booking ID (e.g. BK-XXXXXXXX)
     */
    public function payBooking(Request $request, string $bookingRef)
    {
        $booking = Booking::with('bookable')
            ->where('booking_id', $bookingRef)
            ->firstOrFail();

        // Guard: only confirmed bookings are eligible for payment
        abort_unless($booking->status === 'confirmed', 403, 'This booking is not eligible for payment.');

        $payfastUrl = config('services.payfast.sandbox')
            ? 'https://sandbox.payfast.co.za/eng/process'
            : 'https://www.payfast.co.za/eng/process';

        $itemName = $booking->bookable instanceof \App\Models\Accommodation
            ? $booking->bookable->name
            : $booking->bookable->car_name;

        $nameParts = explode(' ', trim($booking->customer_name), 2);

        // Build params in the exact order PayFast expects them.
        // array_filter removes empty strings so optional fields are never sent
        // or signed — an empty name_last in the POST but not in the signature
        // (or vice-versa) is a guaranteed mismatch.
        $params = array_filter([
            'merchant_id'   => config('services.payfast.merchant_id'),
            'merchant_key'  => config('services.payfast.merchant_key'),
            'return_url'    => route('payfast.return'),
            'cancel_url'    => route('payfast.cancel'),
            'notify_url'    => route('payfast.notify'),
            'name_first'    => $nameParts[0],
            'name_last'     => $nameParts[1] ?? '',
            'email_address' => $booking->customer_email,
            'm_payment_id'  => $booking->booking_id,
            'amount'        => number_format($booking->total_amount, 2, '.', ''),
            'item_name'     => $itemName,
        ], fn ($value) => $value !== '' && $value !== null);

        $params['signature'] = $this->generateSignature(
            $params,
            config('services.payfast.passphrase')
        );

        return view('payfast.redirect', [
            'booking'    => $booking,
            'params'     => $params,
            'payfastUrl' => $payfastUrl,
        ]);
    }

    public function return()
    {
        return 'Payment successful!';
    }

    public function cancel()
    {
        return 'Payment cancelled.';
    }

    public function notify(Request $request)
    {
        // Validate IPN signature before trusting data (critical in production)
        $paymentStatus = $request->input('payment_status');
        $bookingRef    = $request->input('m_payment_id');

        if ($paymentStatus === 'COMPLETE') {
            Booking::where('booking_id', $bookingRef)
                ->update(['payment_status' => 'paid', 'status' => 'completed']);
        }

        return response('OK', 200);
    }
}
