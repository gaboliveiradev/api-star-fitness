<?php

namespace App\Observers;

use App\Models\PersonModel;
use Ramsey\Uuid\Uuid;

class PersonObserver
{
    public function creating(PersonModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
