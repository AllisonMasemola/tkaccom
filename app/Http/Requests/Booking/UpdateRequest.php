<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date_in'            => 'sometimes|date|after_or_equal:today',
            'date_out'           => 'sometimes|date|after:date_in',
            'customer_name'      => 'sometimes|string|max:255',
            'customer_email'     => 'sometimes|email|max:255',
            'customer_phone'     => 'sometimes|string|max:30',
            'status'             => 'sometimes|string|in:pending,confirmed,cancelled,completed',
            'payment_status'     => 'sometimes|string|in:unpaid,paid,refunded',
            'special_request'    => 'nullable|string|max:1000',
            'email_notification' => 'nullable|email|max:255',
        ];
    }
}
