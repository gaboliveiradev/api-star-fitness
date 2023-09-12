<?php

namespace App\Observers;

use App\Models\PersonModel;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class PersonObserver
{
    public function creating(PersonModel $model):void
    {
        $model->id = Uuid::uuid4();
        $model->password = Hash::make($model->password);
    }
}
