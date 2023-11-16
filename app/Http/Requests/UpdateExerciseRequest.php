<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExerciseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'exercise_gif' => [],
            'equipment_gym_photo' => [],
            'muscle_groups' => ['string'],
        ];
    }
}
