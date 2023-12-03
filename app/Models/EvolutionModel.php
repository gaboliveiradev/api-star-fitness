<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionModel extends Model
{
    use HasFactory;

    protected $table = 'evolutions';

    protected $fillable = [
        'complete_date',
        'id_gym_member',
        'active'
    ];

    public function gym_member() {
        return $this->belongsTo(GymMemberModel::class, 'id_gym_member');
    }

    public function measurement() {
        return $this->hasMany(EvolutionModel::class, 'id_evolution');
    }

    public function evolution_exercise_assoc() {
        return $this->hasMany(EvolutionExerciseAssocModel::class, 'id_evolution');
    }
}
