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
}
