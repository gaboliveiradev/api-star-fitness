<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietModel extends Model
{
    use HasFactory;

    protected $table = 'diets';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'id_gym_member',
        'active'
    ];

    public function gym_member() {
        return $this->belongsTo(GymMemberModel::class, 'id_gym_member');
    }

    public function meal() {
        return $this->hasMany(MealModel::class, 'id_meal');
    }
}
