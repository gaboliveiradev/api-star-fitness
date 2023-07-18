<?php

namespace App\Observers;

use App\Models\BillingModel;
use Ramsey\Uuid\Uuid;

class BillingObserver
{
    public function creating(BillingModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
