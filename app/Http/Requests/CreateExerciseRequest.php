<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExerciseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'exercise_gif' => ['required'],
            'equipment_gym_photo' => ['required'],
            'muscle_groups' => ['required', 'string'],
        ];
    }
}
