<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'cref' => ['string'],
            'observation' => ['string'],
        ];
    }
}
