<?php

namespace App\Observers;

use App\Models\PaymentModel;
use Ramsey\Uuid\Uuid;

class PaymentObserver
{
    public function creating(PaymentModel $model):void
    {
        $model->id = Uuid::uuid4();
    }
}
