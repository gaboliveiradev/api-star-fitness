<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'state' => ['string'],
        ];
    }
}
