<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'street' => ['required', 'string'],
            'district' => ['required', 'string'],
            'number' => ['required', 'string'],
            'zip_code' => ['required', 'string', 'size:8'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
        ];
    }
}
