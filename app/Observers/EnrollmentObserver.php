<?php

namespace App\Observers;

use App\Models\EnrollmentModel;
use Ramsey\Uuid\Uuid;

class EnrollmentObserver
{
    public function creating(EnrollmentModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
