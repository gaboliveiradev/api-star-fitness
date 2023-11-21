<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Models\EmployeeModel;
use App\Models\PersonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function getAll()
    {
        $employee = EmployeeModel::with('person', 'person.address')->get();

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
}
