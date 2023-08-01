<?php

namespace App\Observers;

use App\Models\GymMemberModel;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class GymMemberObserver
{
    public function creating(GymMemberModel $model):void
    {
        $model->id = Uuid::uuid4();
        $model->password = Hash::make($model->password);
    }
}
