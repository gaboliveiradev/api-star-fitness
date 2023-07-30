<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private EmployeeModel $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function create(CreateEmployeeRequest $request)
    {
        $employee = $this->employeeModel::create($request->all());

        return $this->success('Employee Created', $employee, 201);
    }
}
