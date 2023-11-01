<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'street' => ['string'],
            'district' => ['string'],
            'number' => ['string'],
            'zip_code' => ['string', 'size:8'],
            'id_city' => ['string'],
        ];
    }
}
