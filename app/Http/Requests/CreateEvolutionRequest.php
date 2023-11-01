<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEvolutionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "complete_date" => ['required', 'date'],
            "id_gym_member" => ['required', 'string']
        ];
    }
}
