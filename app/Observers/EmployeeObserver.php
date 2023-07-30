<?php

namespace App\Observers;

use App\Models\EmployeeModel;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class EmployeeObserver
{
    public function creating(EmployeeModel $model):void
    {
        $model->id = Uuid::uuid4();
        $model->password = Hash::make($model->password);
    }
}
