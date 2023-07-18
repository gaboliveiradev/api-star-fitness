<?php

namespace App\Observers;

use App\Models\TypeModel;
use Ramsey\Uuid\Uuid;

class TypeObserver
{
    public function creating(TypeModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}