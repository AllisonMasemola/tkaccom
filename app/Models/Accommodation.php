<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\Elequent\Bookings\Bookable;


class Accommodation extends Model
{
    use Bookable;
        /**
        * The attributes that are mass assignable.
        *
        * @var array<int, string>
        */
        protected $fillable = [
            'name',
            'description',
            'location',
            'rooms',
            'images',
            'price',
            'availability',
            'bathrooms',
            'showers',
            'aminities',
            'apartment_type',
            'parking',
            'pool',
            'point_of_interest',
        ];
}
