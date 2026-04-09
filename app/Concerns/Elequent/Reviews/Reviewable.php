<?php

namespace App\Concerns\Eloquent\Reviews;

use App\Models\Reviews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Reviewable
{
    /**
     * Get all bookings for this model.
     *
     * @return MorphMany<booking, $this>
     */
    public function reviewable(): MorphMany
    {
        return $this->morphMany(Reviews::class, 'reviewable');
    }
}
