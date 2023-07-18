<?php

namespace App\Observers;

use App\Models\CityModel;
use Ramsey\Uuid\Uuid;

class CityObserver
{
    public function creating(CityModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
