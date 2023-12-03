<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMeasurementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "chest" => [''], 
            "glute" => [''], 
            "left_arm" => [''], 
            "right_arm" => [''], 
            "left_calf" => [''], 
            "right_calf" => [''], 
            "left_forearm" => [''], 
            "right_forearm" => [''], 
            "left_quadriceps" => [''], 
            "right_quadriceps" => [''], 
            "id_evolution" => ['required', 'integer'], 
        ];
    }
}
