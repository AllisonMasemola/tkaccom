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
        'total_amount',
        'special_request',
        'email_notification',
    ];

    protected $casts = [
        'date_in'      => 'datetime',
        'date_out'     => 'datetime',
        // Explicit string cast to prevent boolean coercion from the old schema
        'status'       => 'string',
        // Stored as DECIMAL(10,2); cast to float for arithmetic use in PayFast etc.
        'total_amount' => 'float',
    ];

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
