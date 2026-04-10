<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Http\Resources\BookingResource;
use App\Mail\BookingConfirmed;
use App\Mail\BookingDeclined;
use App\Mail\BookingSuceessful;
use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Prestige;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Resolve the bookable model from the incoming type string.
     * Centralises the type→class mapping to avoid scattered conditionals.
     */
    private function resolveBookable(string $type, int $id): Accommodation|Prestige
    {
        return match ($type) {
            'accommodation' => Accommodation::findOrFail($id),
            'prestige'      => Prestige::findOrFail($id),
        };
    }

    /**
     * Admin: HTML view listing all bookings with optional type filter.
     *
     * ?type=accommodation | ?type=prestige
     */
    public function adminIndex(Request $request): View
    {
        $query = Booking::with('bookable')->latest();

        // Map the friendly URL segment to the full Eloquent morph class name
        if ($type = $request->query('type')) {
            $morphClass = match ($type) {
                'accommodation' => Accommodation::class,
                'prestige'      => Prestige::class,
                default         => null,
            };

            if ($morphClass) {
                $query->where('bookable_type', $morphClass);
            }
        }

        $bookings   = $query->paginate(20)->withQueryString();
        $activeType = $request->query('type');

        // Aggregate status counts for the stats footer (always across all bookings, not the filtered set)
        $statusCounts = Booking::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('admin.bookings.index', compact('bookings', 'activeType', 'statusCounts'));
    }

    /**
     * List all bookings as JSON (used by admin API consumers).
     */
    public function index(): AnonymousResourceCollection
    {
        $bookings = Booking::with('bookable')->latest()->paginate(20);

        return BookingResource::collection($bookings);
    }

    /**
     * Store a new booking.
     *
     * Saves to the DB with status=pending, then emails the customer to let them
     * know their request is under review. No payment is taken at this point.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $bookable = $this->resolveBookable(
            $request->validated('bookable_type'),
            $request->validated('bookable_id'),
        );

        $booking = $bookable->bookings()->create([
            ...$request->safe()->except(['bookable_type', 'bookable_id']),
            'booking_id'     => 'BK-' . strtoupper(Str::random(8)),
            'status'         => 'pending',
            'payment_status' => 'unpaid',
        ]);

        // Reload the bookable relation so the email template can reference it
        $booking->load('bookable');

        // The booking is already persisted at this point — a mail failure must never
        // prevent the user from reaching the success page or lose their booking.
        try {
            Mail::to($booking->customer_email)->send(new BookingSuceessful($booking));
        } catch (\Throwable $e) {
            // Log so ops can investigate, but do not surface to the user
            \Log::error('Booking confirmation email failed', [
                'booking_id' => $booking->booking_id,
                'email'      => $booking->customer_email,
                'error'      => $e->getMessage(),
            ]);
        }

        return redirect()->route('booking.success', $booking->booking_id);
    }

    /**
     * Show the booking success confirmation page.
     * Gives the customer a clear receipt and sets expectations for next steps.
     */
    public function success(string $bookingRef): View
    {
        $booking = Booking::with('bookable')
            ->where('booking_id', $bookingRef)
            ->firstOrFail();

        return view('booking-success', compact('booking'));
    }

    /**
     * Admin: confirm a pending booking.
     *
     * Transitions status → confirmed, generates the PayFast payment URL,
     * and emails it to the customer so they can complete payment.
     */
    public function confirm(Booking $booking): RedirectResponse
    {
        if ($booking->status === 'confirmed') {
            return back()->with('info', 'Booking is already confirmed.');
        }

        $booking->load('bookable');

        $booking->update([
            'status'         => 'confirmed',
            'payment_status' => 'awaiting_payment',
        ]);

        // Build the payment page URL; PayFastController renders the auto-submit form
        $paymentUrl = route('booking.payment', $booking->booking_id);

        try {
            Mail::to($booking->customer_email)->send(new BookingConfirmed($booking, $paymentUrl));
        } catch (\Throwable $e) {
            \Log::error('Booking confirmed email failed', [
                'booking_id' => $booking->booking_id,
                'email'      => $booking->customer_email,
                'error'      => $e->getMessage(),
            ]);
        }

        return back()->with('success', "Booking {$booking->booking_id} confirmed. Payment email sent to {$booking->customer_email}.");
    }

    /**
     * Admin: decline a pending/confirmed booking.
     *
     * Transitions status → declined and notifies the customer by email.
     * Hard-delete is intentionally avoided to preserve audit trail.
     */
    public function decline(Booking $booking): RedirectResponse
    {
        if (in_array($booking->status, ['declined', 'cancelled', 'completed'])) {
            return back()->with('info', 'Booking cannot be declined in its current state.');
        }

        $booking->load('bookable');

        $booking->update(['status' => 'declined']);

        try {
            Mail::to($booking->customer_email)->send(new BookingDeclined($booking));
        } catch (\Throwable $e) {
            \Log::error('Booking declined email failed', [
                'booking_id' => $booking->booking_id,
                'email'      => $booking->customer_email,
                'error'      => $e->getMessage(),
            ]);
        }

        return back()->with('success', "Booking {$booking->booking_id} has been declined. Customer notified.");
    }

    /**
     */
    public function show(Booking $booking): BookingResource
    {
        $booking->load('bookable');

        return new BookingResource($booking);
    }

    /**
     * Update a booking — used by admins to change fields (not confirmation flow).
     */
    public function update(UpdateRequest $request, Booking $booking): BookingResource
    {
        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    /**
     * Cancel a booking by marking it cancelled.
     * Hard delete is intentionally avoided to preserve financial audit trail.
     */
    public function destroy(Booking $booking): JsonResponse
    {
        $booking->update(['status' => 'cancelled']);

        return response()->json(['message' => 'Booking cancelled successfully.']);
    }
}
