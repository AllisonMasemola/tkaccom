<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\Eloquent\Bookings\Bookable;

class Experience extends Model
{
    use Bookable;
    protected $fillable = [
        'name',
        'category',
        'image',
        'location',
        'rating',
        'availability',
        'price',
        'min_age',
        'max_participants',
        'duration',
        'description',
    ];
}
