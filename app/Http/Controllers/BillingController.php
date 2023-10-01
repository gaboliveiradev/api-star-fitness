<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillingRequest;
use App\Models\BillingModel;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function create(CreateBillingRequest $request)
    {
        $billing = BillingModel::create($request->all());

        return $this->success('Billing Created', $billing, 201);
    }
}