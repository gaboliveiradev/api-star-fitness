<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => ['string'],
            "number_of_days" => ['integer'],
            "price" => ['']
        ];
    }
}
