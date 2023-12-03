<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pay_day' => ['required'],
            'id_type_enrollment' => ['required', 'integer'],
            'id_gym_member' => ['required', 'integer'],
        ];
    }
}
