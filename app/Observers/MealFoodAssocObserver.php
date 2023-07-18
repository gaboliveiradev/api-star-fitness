<?php

namespace App\Observers;

use App\Models\MealFoodAssocModel;
use Ramsey\Uuid\Uuid;

class MealFoodAssocObserver
{
    public function creating(MealFoodAssocModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}