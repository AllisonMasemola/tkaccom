<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'date_in',
        'date_out',
        'customer_name',
        'customer_email',
        'customer_phone',
        'status',
        'payment_status',
        'special_request',
        'email_notification',
    ];

    protected $casts = [
        'date_in'  => 'datetime',
        'date_out' => 'datetime',
        // Explicit string cast to prevent boolean coercion from the old schema
        'status'   => 'string',
    ];

    /**
     * Calculate the total booking amount based on the bookable's nightly/daily price.
     * Falls back to the raw price if dates are identical.
     */
    public function getTotalAmountAttribute(): float
    {
        $units = max(1, (int) $this->date_in?->diffInDays($this->date_out));

        return (float) ($this->bookable?->price ?? 0) * $units;
    }

    /**
     * Get the owning bookable model (Accommodation or Prestige).
     *
     * @return MorphTo<Model, $this>
     */
    public function bookable(): MorphTo
    {
        return $this->morphTo();
    }
}
