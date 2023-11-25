<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pay_day' => ['required'],
            'id_type_enrollment' => ['required', 'string'],
            'id_gym_member' => ['required', 'string'],
        ];
    }
}
