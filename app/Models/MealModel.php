<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealModel extends Model
{
    use HasFactory;

    protected $table = 'meals';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'id_diet',
        'active'
    ];

    public function diet() {
        return $this->belongsTo(DietModel::class, 'id_diet');
    }

    public function meal_food_assoc() {
        return $this->hasMany(MealFoodAssocModel::class, 'id_meal');
    }
}
