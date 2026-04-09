<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\Prestige;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Str;

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
     * List all bookings (admin use).
     */
    public function index(): AnonymousResourceCollection
    {
        $bookings = Booking::with('bookable')->latest()->paginate(20);

        return BookingResource::collection($bookings);
    }

    /**
     * Store a new booking against a polymorphic bookable entity.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $bookable = $this->resolveBookable(
            $request->validated('bookable_type'),
            $request->validated('bookable_id'),
        );

        /** @var Booking $booking */
        $booking = $bookable->bookings()->create([
            ...$request->safe()->except(['bookable_type', 'bookable_id']),
            // Generate a human-readable reference if not provided by payment gateway
            'booking_id'     => 'BK-' . strtoupper(Str::random(8)),
            'status'         => 'pending',
            'payment_status' => 'unpaid',
        ]);

        return (new BookingResource($booking))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Show a single booking by its primary key.
     */
    public function show(Booking $booking): BookingResource
    {
        $booking->load('bookable');

        return new BookingResource($booking);
    }

    /**
     * Update a booking — typically used by admins to change status/payment.
     */
    public function update(UpdateRequest $request, Booking $booking): BookingResource
    {
        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    /**
     * Cancel (soft-delete equivalent) a booking by marking it cancelled.
     * Hard delete is intentionally avoided to preserve financial audit trail.
     */
    public function destroy(Booking $booking): JsonResponse
    {
        $booking->update(['status' => 'cancelled']);

        return response()->json(['message' => 'Booking cancelled successfully.']);
    }
}
