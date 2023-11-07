<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGymMemberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_type_enrollment' => ['string']
        ];
    }
}
