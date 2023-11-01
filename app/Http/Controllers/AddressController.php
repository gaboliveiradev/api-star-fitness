<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
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

    public function update(UpdateAddressRequest $request, $id)
    {
        $address = AddressModel::find($id);

        if (!$address) {
            return $this->error('Address Not Found', 404);
        }

        $address->fill($request->only(['street', 'district', 'number', 'zip_code']));
        $address->save();

        return $this->success('Address has updated', $address, 200);
    }
}
