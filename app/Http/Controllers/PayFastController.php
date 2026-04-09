<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayFastController extends Controller
{
    public function pay(Request $request)
    {
        $data = [
            'merchant_id' => config('services.payfast.merchant_id'),
            'merchant_key' => config('services.payfast.merchant_key'),

            'return_url' => route('payfast.return'),
            'cancel_url' => route('payfast.cancel'),
            'notify_url' => route('payfast.notify'),

            'name_first' => 'John',
            'name_last' => 'Doe',
            'email_address' => 'john@example.com',

            'm_payment_id' => uniqid(), // your internal order ID
            'amount' => number_format(100.00, 2, '.', ''),
            'item_name' => 'Test Product',
        ];

        $payfastUrl = config('services.payfast.sandbox')
            ? 'https://sandbox.payfast.co.za/eng/process'
            : 'https://www.payfast.co.za/eng/process';

        return view('checkout', compact('data', 'payfastUrl'));
    }

    public function return()
    {
        return 'Payment successful!';
    }

    public function cancel()
    {
        return 'Payment cancelled.';
    }

    public function notify(Request $request)
    {
        // Validate IPN here (VERY IMPORTANT in production)

        $paymentStatus = $request->input('payment_status');
        $paymentId = $request->input('m_payment_id');

        if ($paymentStatus === 'COMPLETE') {
            // Update your order as paid
        }

        return response('OK', 200);
    }
}
