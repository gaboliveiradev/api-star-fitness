<?php

namespace Database\Seeders;

use App\Models\AddressModel;
use App\Models\BillingModel;
use App\Models\GymMemberModel;
use App\Models\PaymentModel;
use App\Models\PersonModel;
use App\Models\TypeModel;
use Illuminate\Database\Seeder;

class GymMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
            'email' => 'gabirle.oliveira@academiastarfitness.com.br',
            'password' => '123456',
            'document' => '54424309860',
            'phone' => '14981062041',
            'birthday' => '2005-10-04',
            'gender' => 'M',
            'photo_url' => 'https://www.promoview.com.br/uploads/images/unnamed%2819%29.png',
            'id_address' => $address->id,
        ]);

        $type = TypeModel::create([
            'name' => 'Plano Básico',
            'number_of_days' => 6,
            'price' => 85
        ]);

        $gymMember = GymMemberModel::create([
            'id_person' => $person->id,
            'id_type_enrollment' => $type->id,
            'height_cm' => 189,
            'weight_kg' => 85,
        ]);

        $dataAtual = date('Y-m-d');

        $billing = BillingModel::create([
            'pay_day' => $dataAtual,
            'id_type_enrollment' => $type->id,
            'id_gym_member' => $gymMember->id,
        ]);

        PaymentModel::create([
            'id_billing' => $billing->id,
            'payment_method' => 'CREDIT_CARD',
            'payment_date' => $dataAtual,
            'amount' => 89,
        ]);

        // Criar um objeto DateTime com a data de referência
        $dateTime = new \DateTime($dataAtual);

        // Adicionar 30 dias
        $dateTime->modify('+30 days');

        // Obter a data resultante
        $dataFutura = $dateTime->format('Y-m-d');

        BillingModel::create([
            'pay_day' => $dataFutura,
            'id_type_enrollment' => $type->id,
            'id_gym_member' => $gymMember->id,
        ]);
    }
}
