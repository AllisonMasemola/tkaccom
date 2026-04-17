<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\Elequent\Bookings\Bookable;
use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;

class Accommodation extends Model
{
  use Bookable, Filterable, Sortable;

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

  /**
   * Cast DB columns to their correct PHP types.
   * This ensures numeric columns are bound as integers in PDO queries,
   * which in turn makes SQL numeric comparisons (>=, <=) work correctly
   * rather than falling back to lexicographic string comparison.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'rooms'        => 'integer',
    'price'        => 'integer',
    'bathrooms'    => 'integer',
    'availability' => 'boolean',
    'showers'      => 'boolean',
    'parking'      => 'boolean',
    'pool'         => 'boolean',
  ];

  /**
   * Fields that Purity is allowed to filter on.
   * Explicit allowlist — never expose unintended columns to user input.
   *
   * NOTE: `rooms` and `price` are stored as VARCHAR columns.
   * The $gte / $lte filters will use string comparison which can be
   * unreliable for multi-digit values. Consider migrating these to
   * unsignedInteger / unsignedBigInteger to make numeric filtering correct.
   *
   * @var array<int, string>
   */
  protected $filterFields = [
    'apartment_type', // enum: House | Apartment | Hotel | Letting | Other
    'rooms',          // min bedrooms — see type caveat above
    'price',          // max price    — see type caveat above
    'location',
  ];
}
