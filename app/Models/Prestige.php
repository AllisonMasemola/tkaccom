<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\Elequent\Bookings\Bookable;


class Prestige extends Model
{
    use Bookable;

    protected $fillable = [
        'car_name',
        'car_description',
        'transmission',
        'kilometers',
        'year',
        'price',
        'image',
        'make',
        'model',
        'gearbox',
        'body_type',
        'fuel_type',
        'doors',
        'seats',
        'color',
        'availability',
    ];
}
