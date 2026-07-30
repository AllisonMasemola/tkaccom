<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Prestige;
use App\Services\PaystackService;
use App\Services\PaystackWebhookService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PaystackController extends Controller
{
    /**
     * Resolve the bookable model from the URL type segment.
     */
    private function resolveBookable(string $type, int $id): Accommodation|Prestige
    {
        return match ($type) {
            'accommodation' => Accommodation::findOrFail($id),
            'prestige' => Prestige::findOrFail($id),
        };
    }

    /**
     * Render the checkout (guest details) page for a bookable entity.
     * This page collects the guest's info before a booking is created.
     */
    public function pay(Request $request, string $type, int $id): View
    {
        $bookable = $this->resolveBookable($type, $id);

        return view('checkout', [
            'bookable' => $bookable,
            'bookableType' => $type,
        ]);
    }

    /**
     * Initialise a Paystack transaction for a confirmed booking and redirect the
     * customer to Paystack's hosted checkout page.
     */
    public function payBooking(string $bookingRef, PaystackService $paystack): RedirectResponse
    {
        $booking = Booking::with('bookable')
            ->where('booking_id', $bookingRef)
            ->firstOrFail();

        abort_unless($booking->status === 'confirmed', 403, 'This booking is not eligible for payment.');

        if ($booking->payment_status === 'paid') {
            return redirect()->route('paystack.return', ['bookingRef' => $booking->booking_id]);
        }

        $transaction = $paystack->initializeTransaction(
            $booking,
            route('paystack.return', ['bookingRef' => $booking->booking_id]),
        );

        return redirect()->away($transaction['authorization_url']);
    }

    /**
     * Paystack callback URL. Paystack appends ?reference=... after checkout, which we
     * verify server-side before trusting the outcome.
     */
    public function return(Request $request, string $bookingRef, PaystackService $paystack): View
    {
        $booking = Booking::with('bookable')
            ->where('booking_id', $bookingRef)
            ->firstOrFail();

        $reference = (string) $request->query('reference', (string) $booking->payment_reference);

        if ($reference !== '') {
            try {
                $transaction = $paystack->verifyTransaction($reference);

                if ($transaction && data_get($transaction, 'status') === 'success') {
                    $booking->update([
                        'payment_status' => 'paid',
                        'status' => 'completed',
                    ]);
                }
            } catch (\Throwable $e) {
                // The webhook is the source of truth; a verification failure here must not
                // block the customer from seeing their confirmation page.
                Log::error('Paystack verification failed on callback', [
                    'booking_id' => $booking->booking_id,
                    'reference' => $reference,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return view('paystack.payment-return', compact('booking'));
    }

    /**
     * Payment cancellation page.
     */
    public function cancel(string $bookingRef): View
    {
        $booking = Booking::with('bookable')
            ->where('booking_id', $bookingRef)
            ->firstOrFail();

        return view('paystack.payment-cancelled', compact('booking'));
    }

    /**
     * Paystack webhook endpoint — the authoritative source for payment status.
     */
    public function notify(Request $request, PaystackWebhookService $webhookService): Response
    {
        $webhookService->handle($request);

        return response('OK', 200);
    }
}

