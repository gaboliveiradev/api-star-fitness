<?php

namespace App\Observers;

use App\Models\EvolutionExerciseAssocModel;
use Ramsey\Uuid\Uuid;

class EvolutionExerciseAssocObserver
{
    public function creating(EvolutionExerciseAssocModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}