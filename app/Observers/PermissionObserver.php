<?php

namespace App\Observers;

use App\Models\PermissionModel;
use Ramsey\Uuid\Uuid;

class PermissionObserver
{
    public function creating(PermissionModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
