<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the Booking model into an API-friendly array.
     * Fields mirror the bookings migration exactly.
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'booking_id'         => $this->booking_id,
            // Polymorphic owner — include type+id so consumers know what was booked
            'bookable_type'      => $this->bookable_type,
            'bookable_id'        => $this->bookable_id,
            'date_in'            => $this->date_in?->toIso8601String(),
            'date_out'           => $this->date_out?->toIso8601String(),
            'customer_name'      => $this->customer_name,
            'customer_email'     => $this->customer_email,
            'customer_phone'     => $this->customer_phone,
            'status'             => $this->status,
            'payment_status'     => $this->payment_status,
            'special_request'    => $this->special_request,
            'email_notification' => $this->email_notification,
            'created_at'         => $this->created_at?->toIso8601String(),
            'updated_at'         => $this->updated_at?->toIso8601String(),
        ];
    }
}
