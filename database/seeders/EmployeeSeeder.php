<?php

namespace Database\Seeders;

use App\Models\AddressModel;
use App\Models\CityModel;
use App\Models\EmployeeModel;
use App\Models\PersonModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = AddressModel::create([
            'street' => 'Rua Santa Cruz',
            'district' => 'Jardim Paulista',
            'number' => '70',
            'zip_code' => '17250396',
            'city' => 'Bariri',
            'state' => 'SP',
        ]);

        $person = PersonModel::create([
            'name' => 'Jonatha Oliveira',
            'email' => 'jonatha.oliveira@gmail.com',
            'password' => '123456',
            'document' => '23498387680',
            'phone' => '14991877091',
            'birthday' => '1994-10-01',
            'gender' => 'M',
            'photo_url' => 'https://www.promoview.com.br/uploads/images/unnamed%2819%29.png',
            'id_address' => $address->id,
        ]);

        EmployeeModel::create([
            'id_person' => $person->id,
            'cref' => '163161-G/SP',
        ]);
    }
}