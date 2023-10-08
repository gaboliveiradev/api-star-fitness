<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use App\Models\GymMemberModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginAsEmployee(Request $request) {
        $credential = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
            'remember' => ['boolean']
        ]);

        $remember = $credential['remember'] ?? false;

        unset($credential['remember']);

        if (!Auth::guard()->attempt($credential, $remember)) {
            return $this->error('Usuário e/ou senha inválido(s)', 422);
        }

        $person = Auth::guard()->user();
        $token = $person->createToken(env('APP_NAME'))->plainTextToken;

        unset($person['created_at'], $person['email_verified_at'], $person['updated_at']);

        $employee = EmployeeModel::where('id_person', $person->id)->first();
        $person['employee'] = $employee;

        return response()->json([
            'user' => $person,
            'token' => $token
        ], 200);
    }

    public function loginAsGymMember(Request $request)
    {
        $credential = $request->validate([
            'document' => ['required', 'string'],
            'password' => ['required'],
            'remember' => ['boolean']
        ]);

        $remember = $credential['remember'] ?? false;

        unset($credential['remember']);

        if (!Auth::guard()->attempt($credential, $remember)) {
            return $this->error('Usuário e/ou senha inválido(s)', 422);
        }

        $person = Auth::guard()->user();
        $token = $person->createToken(env('APP_NAME'))->plainTextToken;

        unset($person['created_at'], $person['email_verified_at'], $person['updated_at']);

        $gymMember = GymMemberModel::where('id_person', $person->id)->first();
        $person['gymMember'] = $gymMember;

        return response()->json([
            'user' => $person,
            'token' => $token
        ]);
    }
}
