<?php

namespace App\Observers;

use App\Models\MealModel;
use Ramsey\Uuid\Uuid;

class MealObserver
{
    public function creating(MealModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
