<?php

namespace App\Http\Requests\Prestige;

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
            'car_name'              => 'required|string|max:125',
            'car_description'       => 'required:string',
            'transmission'             => 'required|string|max:125',
            'kilometers'             => 'required|numeric|min:1',
            'year'          => 'nullable|string',
            'price'            => 'nullable|string',
            'image.*'          => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'make'      => 'required|string',
            'model'         => 'required|string',
            'gearbox'           => 'sometimes|string', // todo: findout whats the diff between this and transmission
            'body_type'         => 'required|string',
            'fuel_type'    => 'required|string',
            'doors'           => 'required|integer',
            'seats'              => 'required|integer',
            'color' => 'required|string',
        ];
    }
}
