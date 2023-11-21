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
            'phone' => ['required', 'string', 'size:11'],
            'birthday' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', 'string', 'size:1'],
            'cref' => ['required', 'string'],
            'observation' => [],
            'id_address' => ['required', 'string'],
        ];
    }
}
