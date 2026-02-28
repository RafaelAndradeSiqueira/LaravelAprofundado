<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public static function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
        ]);
    }

    public static function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    public static function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Logout realizado']);
    }


}
