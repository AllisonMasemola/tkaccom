<?php

namespace App\Concerns\Elequent\Bookings;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Bookable
{
    /**
     * Get all bookings for this bookable model.
     *
     * @return MorphMany<Booking, $this>
     */
    public function bookings(): MorphMany
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}
