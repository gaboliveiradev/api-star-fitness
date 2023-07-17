<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseModel extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'exercise_gif',
        'equipment_gym_photo',
        'muscle_groups',
        'active'
    ];

    public function routine_exercise_assoc() {
        return $this->hasMany(RoutineExerciseAssocModel::class, 'id_workout_routine');
    }

    public function evolution_exercise_assoc() {
        return $this->hasMany(EvolutionExerciseAssocModel::class, 'id_exercise');
    }
}
