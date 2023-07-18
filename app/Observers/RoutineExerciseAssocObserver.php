<?php

namespace App\Observers;

use App\Models\RoutineExerciseAssocModel;
use Ramsey\Uuid\Uuid;

class RoutineExerciseAssocObserver
{
    public function creating(RoutineExerciseAssocModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}