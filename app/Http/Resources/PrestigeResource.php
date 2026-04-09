<?php

namespace App\Http\Resources;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrestigeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'car_name' => $this->car_name,
            'car_description' => $this->car_description,
            'transmission' => $this->transmission,
            'kilometers' => $this->kilometers,
            'year' => $this->year,
            'price' => $this->price,
            'image' => $this->image,
            'make' => $this->make,
            'model' => $this->model,
            'gearbox' => $this->gearbox,
            'body_type' => $this->body_type,
            'fuel_type' => $this->fuel_type,
            'doors' => $this->doors,
            'seats' => $this->seats,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
