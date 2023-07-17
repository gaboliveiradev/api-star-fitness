<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealFoodAssocModel extends Model
{
    use HasFactory;

    protected $table = 'meals_foods_assoc';

    public $incrementing = false;

    protected $fillable = [
        'id_meal',
        'id_food',
        'serving',
        'carbohydrates',
        'proteins',
        'fats',
        'calories',
        'active'
    ];

    public function meal() {
        return $this->belongsTo(MealModel::class, 'id_meal');
    }

    public function food() {
        return $this->belongsTo(FoodModel::class, 'id_food');
    }
}
