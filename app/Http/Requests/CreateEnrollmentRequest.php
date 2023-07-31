<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnrollmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'enrollment_date' => ['required', 'date_format:Y-m-d'],
            'id_type' => ['required', 'string']
        ];
    }
}
