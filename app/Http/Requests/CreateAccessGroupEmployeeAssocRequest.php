<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccessGroupEmployeeAssocRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_access_group' => ['required', 'string'],
            'id_employee' => ['required', 'string'],
        ];
    }
}
