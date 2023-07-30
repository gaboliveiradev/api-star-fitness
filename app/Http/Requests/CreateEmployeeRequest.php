<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'document' => ['required', 'string', 'size:11'], 
            'cref' => ['required', 'string'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'observation' => ['string'],
            'id_address' => ['required', 'string'],
        ];
    }
}
