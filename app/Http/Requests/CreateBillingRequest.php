<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'invoice_date' => ['required'],
            'due_date' => ['required'],
            'id_gym_member' => ['required', 'string'],
        ];
    }
}
