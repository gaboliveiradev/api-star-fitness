<?php

namespace Database\Seeders;

use App\Models\AccessGroupEmployeeAssocModel;
use App\Models\AccessGroupModel;
use App\Models\EmployeeModel;
use App\Models\PersonModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcessGroupEmployeeAssocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proprietario = AccessGroupModel::where("name", "Proprietário(a)")->first();
        $person = PersonModel::where("name", "Jonatha Oliveira")->first();
        $employee = EmployeeModel::where("id_person", $person->id)->first();

        AccessGroupEmployeeAssocModel::create([
            'id_access_group' => $proprietario->id,
            'id_employee' => $employee->id,
        ]);

        $personal = AccessGroupModel::where("name", "Personal")->first();
        $person = PersonModel::where("name", "Rafael Sanches")->first();
        $employee = EmployeeModel::where("id_person", $person->id)->first();

        AccessGroupEmployeeAssocModel::create([
            'id_access_group' => $personal->id,
            'id_employee' => $employee->id,
        ]);
    }
}
