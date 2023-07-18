<?php

namespace App\Observers;

use App\Models\AddressModel;
use Ramsey\Uuid\Uuid;

class AddressObserver
{
    public function creating(AddressModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
