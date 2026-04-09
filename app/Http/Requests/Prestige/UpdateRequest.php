<?php

namespace App\Http\Requests\Prestige;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * Uses 'sometimes' so only submitted fields are validated,
     * allowing partial updates (PATCH-friendly).
     */
    public function rules(): array
    {
        return [
            'car_name'              => 'sometimes|string|max:125',
            'car_description'       => 'sometimes:string',
            'transmission'             => 'sometimes|in:automatic,manual',
            'kilometers'             => 'sometimes|numeric|min:1',
            'year'          => 'sometimes|string',
            'price'            => 'sometimes|string',
            'image.*'          => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'make'      => 'sometimes|string',
            'model'         => 'sometimes|string',
            'gearbox'           => 'sometimes|string',
            'body_type'         => 'sometimes|string',
            'fuel_type'    => 'sometimes|string|in:petrol,diesel,electric,hybrid,other',
            'doors'           => 'sometimes|integer',
            'seats'              => 'sometimes|integer',
            'color'        => 'sometimes|string',
            // 'availability' must be included so the toggle is persisted on update
            'availability' => 'sometimes|boolean',
        ];
    }
}
