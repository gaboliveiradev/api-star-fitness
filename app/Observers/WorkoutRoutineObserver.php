<?php

namespace App\Observers;

use App\Models\WorkoutRoutineModel;
use Ramsey\Uuid\Uuid;

class WorkoutRoutineObserver
{
    public function creating(WorkoutRoutineModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
