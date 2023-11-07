<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => ['string', 'email'],
            'document' => ['string', 'size:11'],
            'phone' => ['string', 'size:11'],
            'birthday' => ['date'],
            'gender' => ['string', 'size:1'],
        ];
    }
}
