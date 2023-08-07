<?php

namespace App\Http\Controllers;

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

        if (!Auth::guard('web')->attempt($credential, $remember)) {
            return $this->error('Usuário e/ou senha inválido(s)', 422);
        }

        $user_employee = Auth::guard('web')->user();
        $token = $user_employee->createToken(env('APP_NAME'))->plainTextToken;

        unset($user_employee['id'], $user_employee['active'], $user_employee['created_at'], $user_employee['email_verified_at'], $user_employee['updated_at']);

        return response()->json([
            'employee' => $user_employee,
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

        if (!Auth::guard('gym-member')->attempt($credential, $remember)) {
            return $this->error('Usuário e/ou senha inválido(s)', 422);
        }

        $user_gymMember = Auth::guard('gym-member')->user();
        $token = $user_gymMember->createToken(env('APP_NAME'))->plainTextToken;

        unset($user_gymMember['id'], $user_gymMember['active'], $user_gymMember['created_at'], $user_gymMember['email_verified_at'], $user_gymMember['updated_at']);

        return response()->json([
            'gym_member' => $user_gymMember,
            'token' => $token
        ]);
    }
}
