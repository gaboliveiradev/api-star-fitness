<?php

namespace App\Observers;

use App\Models\GymMemberModel;
use Ramsey\Uuid\Uuid;

class GymMemberObserver
{
    public function creating(GymMemberModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
