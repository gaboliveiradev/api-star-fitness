<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGymMemberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'document' => ['required', 'string', 'size:11'], 
            'phone' => ['required', 'string'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', 'string'],
            'height_cm' => ['string'],
            'weight_kg' => ['string'],
            'photo_url' => ['string'],
            'observatin' => ['string'],
            'id_address' => ['required', 'string'],
            'id_enrollment' => ['required', 'string']
        ];
    }
}
