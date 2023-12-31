<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\EmployeeModel;
use App\Models\PersonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function getAll()
    {
        $employee = EmployeeModel::with('person', 'person.address', 'access_group_employee_assoc')->get();

        return $this->success('Employees', $employee, 200);
    }

    public function create(CreateEmployeeRequest $request)
    {
        $person = PersonModel::create([
            'name' => $request->all()['name'],
            'email' => $request->all()['email'],
            'password' => Hash::make($request->all()['password']),
            'document' => $request->all()['document'],
            'phone' => $request->all()['phone'],
            'birthday' => $request->all()['birthday'],
            'gender' => $request->all()['gender'],
            'photo_url' => 'https://www.promoview.com.br/uploads/images/unnamed%2819%29.png',
            'id_address' => $request->all()['id_address'],
        ]);

        $employee = EmployeeModel::create([
            'id_person' => $person->id,
            'cref' => $request->all()['cref'],
            'observation' => $request->all()['observation'],
        ]);

        $employee['person'] = $person;


        return $this->success('Employee Created', $employee, 201);
    }

    public function update(UpdateEmployeeRequest $request, $id) 
    {
        $employee = EmployeeModel::find($id);

        if (!$employee) {
            return $this->error('Funcionário Inexistente.', 404);
        }

        $employee->fill($request->only(['cref', 'observation']));
        $employee->save();

        return $this->success('Funcionário Atualizado.', $employee, 200);
    }

    public function delete($id) 
    {
        $employee = EmployeeModel::where('id', $id)->first();

        if (!$employee) {
            return $this->error('Employee Not Found', 404);
        }

        if (!$employee->active) {
            return $this->error('This employee is already deactivated.', 422);
        }

        $employee->active = false;
        $employee->save();

        return $this->success('Employee Deactivated Successfully', $employee, 200);
    }
}
