<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodModel extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'carbohydrates',
        'proteins',
        'fats',
        'calories',
        'active'
    ];

    public function meal_food_assoc() {
        return $this->hasMany(MealFoodAssocModel::class, 'id_food');
    }
}
