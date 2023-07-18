<?php

namespace App\Observers;

use App\Models\AccessGroupEmployeeAssocModel;
use Ramsey\Uuid\Uuid;

class AccessGroupEmployeeAssocObserver
{
    public function creating(AccessGroupEmployeeAssocModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
