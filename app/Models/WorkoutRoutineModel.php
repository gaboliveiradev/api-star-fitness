<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutRoutineModel extends Model
{
    use HasFactory;

    protected $table = 'workouts_routines';

    protected $fillable = [
        'name',
        'id_gym_member',
        'default',
        'active'
    ];

    public function gym_member() {
        return $this->belongsTo(GymMemberModel::class, 'id_gym_member');
    }

    public function routine_exercise_assoc() {
        return $this->hasMany(RoutineExerciseAssocModel::class, 'id_workout_routine');
    }
}
