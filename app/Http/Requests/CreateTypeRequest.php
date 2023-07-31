<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => ['required', 'string'],
            "number_of_days" => ['required', 'integer'],
            "price" => ['required']
        ];
    }
}
