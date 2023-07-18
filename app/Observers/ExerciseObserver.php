<?php

namespace App\Observers;

use App\Models\ExerciseModel;
use Ramsey\Uuid\Uuid;

class ExerciseObserver
{
    public function creating(ExerciseModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}