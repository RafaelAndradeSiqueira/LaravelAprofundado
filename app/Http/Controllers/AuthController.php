<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return AuthService::login($request);
    }

    public function me()
    {
        return AuthService::me();
    }

    public function logout()
    {
        return AuthService::logout();

    }
}
