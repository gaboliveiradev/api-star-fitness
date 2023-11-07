<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGymMemberRequest;
use App\Http\Requests\UpdateGymMemberRequest;
use App\Models\EnrollmentModel;
use App\Models\GymMemberModel;
use App\Models\PersonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GymMemberController extends Controller
{
    private GymMemberModel $gymMemberModel;

    public function __construct()
    {
        $this->gymMemberModel = new GymMemberModel();
    }

    public function create(Request $request) 
    {
        $person = PersonModel::create([
            'name' => $request->all()['name'],
            'email' => $request->all()['email'],
            'password' => Hash::make('123456'),
            'document' => $request->all()['document'],
            'phone' => $request->all()['phone'],
            'birthday' => $request->all()['birthday'],
            'gender' => $request->all()['gender'],
            'photo_url' => 'https://www.promoview.com.br/uploads/images/unnamed%2819%29.png',
            'id_address' => $request->all()['id_address'],
        ]);

        $gymMember = GymMemberModel::create([
            'id_person' => $person->id,
            'height_cm' => $request->all()['height_cm'],
            'weight_kg' => $request->all()['weight_kg'],
            'observation' => $request->all()['observation'],
            'id_type_enrollment' => $request->all()['id_type_enrollment'],
        ]);

        $gymMember['person'] = $person;

        return $this->success('Gym Member Created', $gymMember, 201);
    }

    public function getAll() {
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
