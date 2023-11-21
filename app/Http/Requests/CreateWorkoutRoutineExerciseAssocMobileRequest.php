<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkoutRoutineExerciseAssocMobileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_workout_routine' => ['required', 'string'],
            'id_exercise' => ['required', 'string'],
            'week_day' => ['required', 'string'],
            'sets' => ['required', 'integer'],
            'repetitions' => ['required', 'integer'],
            'rest_seconds' => ['required'],
            'observation' => [],
        ];
    }
}
