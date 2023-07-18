<?php

namespace App\Observers;

use App\Models\EmployeeModel;
use Ramsey\Uuid\Uuid;

class EmployeeObserver
{
    public function creating(EmployeeModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
