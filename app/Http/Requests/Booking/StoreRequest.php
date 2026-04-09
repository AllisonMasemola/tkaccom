<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Which model is being booked — must resolve to an existing row
            'bookable_type' => 'required|string|in:accommodation,prestige',
            'bookable_id'   => 'required|integer|min:1',

            'date_in'            => 'required|date|after_or_equal:today',
            'date_out'           => 'required|date|after:date_in',
            'customer_name'      => 'required|string|max:255',
            'customer_email'     => 'required|email|max:255',
            'customer_phone'     => 'required|string|max:30',
            'special_request'    => 'nullable|string|max:1000',
            'email_notification' => 'nullable|email|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'date_out.after'            => 'Check-out must be after check-in.',
            'date_in.after_or_equal'    => 'Check-in cannot be in the past.',
            'bookable_type.in'          => 'Bookable type must be accommodation or prestige.',
        ];
    }
}
