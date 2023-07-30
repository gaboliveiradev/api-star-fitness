<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginAsEmployee(Request $request) {
        $credential = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required'],
            'remember' => ['boolean']
        ]);

        $remember = $credential['remember'] ?? false;

        unset($credential['remember']);

        if (!Auth::attempt($credential, $remember)) {
            return $this->error('Usuário e/ou senha inválido(s)', 422);
        }

        $user = Auth::user();
        $token = $user->createToken(env('APP_NAME'))->plainTextToken;

        unset($user['active'], $user['created_at'], $user['email_verified_at'], $user['updated_at']);

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
