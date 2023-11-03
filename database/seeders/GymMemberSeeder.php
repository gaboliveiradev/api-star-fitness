<?php

namespace Database\Seeders;

use App\Models\AddressModel;
use App\Models\BillingModel;
use App\Models\CityModel;
use App\Models\GymMemberModel;
use App\Models\PersonModel;
use App\Models\TypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymMemberSeeder extends Seeder
{
    public function run(): void
    {
        $address = AddressModel::create([
            'street' => 'Rua Santa Cruz',
            'district' => 'Jardim Paulista',
            'number' => '149',
            'zip_code' => '17250396',
            'city' => 'Bariri',
            'state' => 'SP',
        ]);

        $person = PersonModel::create([
            'name' => 'Gabriel Oliveira',
            'email' => 'gabriel@teste.com',
            'password' => '123456',
            'document' => '54424309860',
            'phone' => '14991877091',
            'birthday' => '2005-10-04',
            'gender' => 'M',
            'photo_url' => 'https://www.promoview.com.br/uploads/images/unnamed%2819%29.png',
            'id_address' => $address->id,
        ]);

        $type = TypeModel::create([
            'name' => 'Plano Básico',
            'number_of_days' => 6,
            'price' => 89.9
        ]);

        $gymMember = GymMemberModel::create([
            'id_person' => $person->id,
            'id_type_enrollment' => $type->id,
            'height_cm' => 182,
            'weight_kg' => 84.90,
        ]);

        $dataAtual = date("Y-m-d");
        $data = new \DateTime($dataAtual);
        $data->modify("+30 days");

        $dataFutura = $data->format("Y-m-d");

        BillingModel::create([
            'invoice_date' => $dataAtual,
            'due_date' => $dataFutura,
            'id_type_enrollment' => $type->id,
            'id_gym_member' => $gymMember->id,
        ]);
    }
}