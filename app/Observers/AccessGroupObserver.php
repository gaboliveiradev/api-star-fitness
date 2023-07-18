<?php

namespace App\Observers;

use App\Models\AccessGroupModel;
use Ramsey\Uuid\Uuid;

class AccessGroupObserver
{
    public function creating(AccessGroupModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
