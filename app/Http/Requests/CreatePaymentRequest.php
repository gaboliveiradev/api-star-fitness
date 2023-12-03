<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_billing' => ['required', 'integer'],
            'payment_method' => ['required', 'string'],
            'payment_date' => ['required', 'string'],
            'amount' => 'required',
        ];
    }
}
