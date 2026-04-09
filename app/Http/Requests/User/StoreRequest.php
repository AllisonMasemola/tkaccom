<?php

namespace App\Http\Requests\User;

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
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:125|string',
            'last_name' => 'required|max:125|string',
            'email' => 'required|max:125|email|unique:App\Models\User',
            'locale' => 'sometimes|required|string',
        ];
    }
}
