<?php

namespace App\Http\Requests\Accommodation;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * Key fixes applied:
     * - 'availability' was misspelled as 'availablility'
     * - 'decimal:5,2' was invalid (min > max); replaced with 'numeric|min:0'
     * - 'images' changed to nullable array to support multi-file upload
     * - boolean selects accept '0'/'1' strings via 'in:0,1'
     * - 'location' was missing entirely
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|string|max:125',
            'description'       => 'required',
            'price'             => 'required|numeric|min:0',
            'rooms'             => 'required|numeric|min:1',
            'location'          => 'nullable|string|max:255',
            'images'            => 'nullable|array',
            'images.*'          => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'availability'      => 'required|in:0,1',
            'bathrooms'         => 'required|numeric|min:1',
            'showers'           => 'required|in:0,1',
            'aminities'         => 'required|string',
            'apartment_type'    => 'required|string|in:House,Apartment,Hotel,Letting,Other',
            'parking'           => 'required|in:0,1',
            'pool'              => 'required|in:0,1',
            'point_of_interest' => 'nullable|string',
        ];
    }
}
