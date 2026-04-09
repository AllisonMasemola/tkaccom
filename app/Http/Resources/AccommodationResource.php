<?php

namespace App\Http\Resources;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccommodationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'price' => $this->price,
            'rooms' => $this->rooms,
            'images' => $this->images,
            'availability' => $this->availability,
            'bathrooms' => $this->bathrooms,
            'showers' => $this->showers,
            'aminities' => $this->aminities,
            'apartment_type' => $this->apartment_type,
            'parking' => $this->parking,
            'pool' => $this->pool,
            'point_of_interest' => $this->point_of_interest,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
