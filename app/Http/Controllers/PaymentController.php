<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdateBillingRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\PaymentModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(CreatePaymentRequest $request) 
    {
        $payment = PaymentModel::create($request->all());

        return $this->success('Payment Created', $payment, 201);
    }
}
