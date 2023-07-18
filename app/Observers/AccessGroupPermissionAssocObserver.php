<?php

namespace App\Observers;

use App\Models\AccessGroupPermissionAssocModel;
use Ramsey\Uuid\Uuid;

class AccessGroupPermissionAssocObserver
{
    public function creating(AccessGroupPermissionAssocModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
