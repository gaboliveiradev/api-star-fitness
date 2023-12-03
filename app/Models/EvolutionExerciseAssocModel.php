<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionExerciseAssocModel extends Model
{
    use HasFactory;

    protected $table = 'evolutions_exercises_assoc';

    protected $fillable = [
        'id_evolution',
        'id_exercise',
        'muscle',
        'repetitions',
        'weight',
        'active'
    ];

    public function evolution() {
        return $this->belongsTo(EvolutionModel::class, 'id_evolution');
    }
    
    public function exercise() {
        return $this->belongsTo(ExerciseModel::class, 'id_exercise');
    }
}
