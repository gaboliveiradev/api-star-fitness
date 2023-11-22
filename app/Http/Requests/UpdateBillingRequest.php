<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBillingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'payment_date' => ['required'],
        ];
    }
}
