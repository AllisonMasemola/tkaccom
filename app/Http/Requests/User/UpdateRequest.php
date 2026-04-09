<?php

namespace App\Http\Requests\User;

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
    public function rules(): array
    {
        return [
            'first_name' => 'sometimes|required|max:125|string',
            'last_name' => 'sometimes|required|max:125|string',
            'email' => 'sometimes', 'required', 'max:125', 'email',
            'role' => 'sometimes|required',
        ];
    }
}
