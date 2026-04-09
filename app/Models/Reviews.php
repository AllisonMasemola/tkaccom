<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reviews extends Model
{



    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
