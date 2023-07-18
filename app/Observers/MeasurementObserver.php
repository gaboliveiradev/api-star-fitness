<?php

namespace App\Observers;

use App\Models\MeasurementModel;
use Ramsey\Uuid\Uuid;

class MeasurementObserver
{
    public function creating(MeasurementModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}