<?php

namespace App\Http\Requests\Accommodation;

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
            'name'              => 'sometimes|string|max:125',
            'description'       => 'sometimes',
            'price'             => 'sometimes|numeric|min:0',
            'rooms'             => 'sometimes|numeric|min:1',
            'location'          => 'sometimes|nullable|string|max:255',
            'images'            => 'sometimes|nullable|array',
            'images.*'          => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'availability'      => 'sometimes|in:0,1',
            'bathrooms'         => 'sometimes|numeric|min:1',
            'showers'           => 'sometimes|in:0,1',
            'aminities'         => 'sometimes|string',
            'apartment_type'    => 'sometimes|string|in:House,Apartment,Hotel,Letting,Other',
            'parking'           => 'sometimes|in:0,1',
            'pool'              => 'sometimes|in:0,1',
            'point_of_interest' => 'sometimes|nullable|string',
        ];
    }
}
