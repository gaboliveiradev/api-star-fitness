<?php

namespace App\Observers;

use App\Models\DietModel;
use Ramsey\Uuid\Uuid;

class DietObserver
{
    public function creating(DietModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}