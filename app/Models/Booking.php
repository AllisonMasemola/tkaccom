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
