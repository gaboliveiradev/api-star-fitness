<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkoutRoutineExerciseAsssocRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_workout_routine' => ['required', 'integer'],
            'array_exercises' => ['required', 'array'],
        ];
    }
}
