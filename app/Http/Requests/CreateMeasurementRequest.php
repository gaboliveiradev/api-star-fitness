<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMeasurementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "chest" => ['double'], 
            "glute" => ['double'], 
            "left_arm" => ['double'], 
            "right_arm" => ['double'], 
            "left_calf" => ['double'], 
            "right_calf" => ['double'], 
            "left_forearm" => ['double'], 
            "right_forearm" => ['double'], 
            "left_quadriceps" => ['double'], 
            "right_quadriceps" => ['double'], 
            "id_evolution" => ['required', 'string'], 
        ];
    }
}
