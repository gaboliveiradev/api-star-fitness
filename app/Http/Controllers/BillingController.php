<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillingRequest;
use App\Http\Requests\UpdateBillingRequest;
use App\Models\BillingModel;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function create(CreateBillingRequest $request)
    {
        $billing = BillingModel::create($request->all());

        return $this->success('Billing Created', $billing, 201);
    }

    public function update(UpdateBillingRequest $request, $id)
    {
        $billing = BillingModel::find($id);

        if (!$billing) {
            return $this->error('Billing Not Found', 404);
        }

        $billing->fill($request->only(['payment_date']));
        $billing->save();

        return $this->success('Billing has updated', $billing, 200);
    }
    
    public function getAllByIdUser($id) 
    {
        $start = '2023-10-06';
        $end = '2023-11-05';

        $billings = BillingModel::where('id_gym_member', $id)->first();
        
        return $this->success('Billings Find', $billings, 200);
    }
}