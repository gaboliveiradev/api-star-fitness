<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Models\AddressModel;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private AddressModel $addressModel;

    public function __construct() 
    {
        $this->addressModel = new AddressModel();
    }

    public function create(CreateAddressRequest $request)
    {
        $address = $this->addressModel::create($request->all());

        return $this->success('Address Created', $address, 201);
    }
}
