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
    
    public function getAllByIdUser($id) 
    {
        $start = '2023-10-06';
        $end = '2023-11-05';

        $billings = BillingModel::where('id_gym_member', $id)->first();
        
        return $this->success('Billings Find', $billings, 200);
    }
}