<?php

namespace App\Observers;

use App\Models\EvolutionModel;
use Ramsey\Uuid\Uuid;

class EvolutionObserver
{
    public function creating(EvolutionModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}