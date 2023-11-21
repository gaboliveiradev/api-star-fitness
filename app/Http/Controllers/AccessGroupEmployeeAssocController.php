<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccessGroupEmployeeAssocRequest;
use App\Models\AccessGroupEmployeeAssocModel;
use Illuminate\Http\Request;

class AccessGroupEmployeeAssocController extends Controller
{
    public function createAccessGroupEmployeeAssoc(CreateAccessGroupEmployeeAssocRequest $request)
    {
        $accessGroupEmployeeAssoc = AccessGroupEmployeeAssocModel::create($request->all());

        return $this->success('Access Group Employee Assoc', $accessGroupEmployeeAssoc, 201);
    }
}
