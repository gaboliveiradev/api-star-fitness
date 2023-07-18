<?php

namespace App\Observers;

use App\Models\FoodModel;
use Ramsey\Uuid\Uuid;

class FoodObserver
{
    public function creating(FoodModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}