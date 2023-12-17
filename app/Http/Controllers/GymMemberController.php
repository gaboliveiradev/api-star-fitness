<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGymMemberRequest;
use App\Http\Requests\UpdateGymMemberRequest;
use App\Mail\Welcome;
use App\Models\AddressModel;
use App\Models\BillingModel;
use App\Models\GymMemberModel;
use App\Models\PaymentModel;
use App\Models\PersonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class GymMemberController extends Controller
{
    private GymMemberModel $gymMemberModel;

    public function __construct()
    {
        $this->gymMemberModel = new GymMemberModel();
    }

    private function sendEmail($idPerson)
    {
        $person = PersonModel::find($idPerson);

        Mail::to($person->email)->send(new Welcome($person));
    }

    public function enrollGymMember(Request $request)
    {
        $request->validate([
            // address
            'street' => 'required|string',
            'district' => 'required|string',
            'number' => 'required',
            'zip_code' => 'required|size:8',
            'city' => 'required|string',
            'state' => 'required|string',
            // person
            'name' => 'required|string',
            'email' => 'required|string|email',
            'document' => 'required|size:11|unique:persons,document',
            'phone' => 'required|size:11',
            'birthday' => 'required|date',
            'gender' => 'required|string|size:1',
            // billing & payment
            'id_type_enrollment' => 'required|integer',
            'payment_method' => 'required|string',
            'amount' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $actualDate = date('Y-m-d');

            $dateTime = new \DateTime($actualDate);
            $dateTime->modify('+30 days');
            $futureDate = $dateTime->format('Y-m-d');

            $address = AddressModel::create([
                'street' => $request->get('street'),
                'district' => $request->get('district'),
                'number' => $request->get('number'),
                'zip_code' => $request->get('zip_code'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
            ]);

            $person = PersonModel::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => '123456',
                'document' => $request->get('document'),
                'phone' => $request->get('phone'),
                'birthday' => $request->get('birthday'),
                'gender' => $request->get('gender'),
                'photo_url' => 'https://cdn-icons-png.flaticon.com/512/10141/10141012.png',
                'id_address' => $address->id,
            ]);

            $gymMember = GymMemberModel::create([
                'id_person' => $person->id,
                'id_type_enrollment' => $request->get('id_type_enrollment'),
                'height_cm' => (empty($request->get('height_cm'))) ? null : $request->get('height_cm'),
                'weight_kg' => (empty($request->get('weight_kg'))) ? null : $request->get('weight_kg'),
                'observation' => (empty($request->get('observation'))) ? null : $request->get('observation'),
            ]);

            $billing = BillingModel::create([
                'pay_day' => $actualDate,
                'id_type_enrollment' => $request->get('id_type_enrollment'),
                'id_gym_member' => $gymMember->id
            ]);

            PaymentModel::create([
                'id_billing' => $billing->id,
                'payment_method' => $request->get('payment_method'),
                'payment_date' => $actualDate,
                'amount' => $request->get('amount'),
            ]);

            BillingModel::create([
                'pay_day' => $futureDate,
                'id_type_enrollment' => $request->get('id_type_enrollment'),
                'id_gym_member' => $gymMember->id,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), 404);
        }

        DB::commit();

        $this->sendEmail($person->id);

        return $this->success('Aluno Matriculado.', $gymMember, 201);
    }

    public function getAll()
    {
        $gymMember = GymMemberModel::with('person', 'person.address', 'type', 'billing')->get();

        return $this->success('Gym Members', $gymMember, 200);
    }

    public function update(UpdateGymMemberRequest $request, $id)
    {
        $gymMember = GymMemberModel::find($id);

        if (!$gymMember) {
            return $this->error('GymMember Not Found', 404);
        }

        $gymMember->fill($request->only(['height_cm', 'weight_kg', 'observation', 'id_type_enrollment']));
        $gymMember->save();

        return $this->success('Gym Member has updated', $gymMember, 200);
    }

    public function delete($id)
    {
        $gymMember = GymMemberModel::where('id', $id)->first();

        if (!$gymMember) {
            return $this->error('Gym Member Not Found', 404);
        }

        if (!$gymMember->active) {
            return $this->error('This gym member is already deactivated.', 422);
        }

        $gymMember->active = false;
        $gymMember->save();

        return $this->success('Gym Member Deactivated Successfully', $gymMember, 200);
    }
}
