<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineExerciseAssocModel extends Model
{
    use HasFactory;

    protected $table = 'routines_exercises_assoc';

    protected $fillable = [
        'id_workout_routine',
        'id_exercise',
        'week_day',
        'sets',
        'repetitions',
        'rest_seconds',
        'observation',
        'active'
    ];

    public function workout_routine() {
        return $this->belongsTo(WorkoutRoutineModel::class, 'id_workout_routine');
    }

    public function exercise() {
        return $this->belongsTo(ExerciseModel::class, 'id_exercise');
    }
}
