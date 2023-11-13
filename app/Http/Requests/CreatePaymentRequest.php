<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_billing' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
            'amount' => 'required',
        ];
    }
}
