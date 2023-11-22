<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccessGroupEmployeeAssocRequest;
use App\Http\Requests\UpdateAccessGroupEmployeeAssocRequest;
use App\Models\AccessGroupEmployeeAssocModel;
use Illuminate\Http\Request;

class AccessGroupEmployeeAssocController extends Controller
{
    public function createAccessGroupEmployeeAssoc(CreateAccessGroupEmployeeAssocRequest $request)
    {
        $accessGroupEmployeeAssoc = AccessGroupEmployeeAssocModel::create($request->all());

        return $this->success('Access Group Employee Assoc', $accessGroupEmployeeAssoc, 201);
    }

    public function update(UpdateAccessGroupEmployeeAssocRequest $request) 
    {
        $accessGroupEmployee = AccessGroupEmployeeAssocModel::where('id_employee', $request->all()['id_employee'])->first();

        if (!$accessGroupEmployee) {
            return $this->error('Access Group Employee Assoc Not Found', 404);
        }

        AccessGroupEmployeeAssocModel::where('id_employee', $request->all()['id_employee'])->update([
            'id_access_group' => $request->all()['id_access_group'],
        ]);

        /*$accessGroupEmployee->fill($request->only(['id_access_group']));
        $accessGroupEmployee->save();*/

        return $this->success('Access Group Employee Assoc has updated', $accessGroupEmployee, 200);
    }
}
