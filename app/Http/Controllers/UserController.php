<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;

use App\Services\UserService;

class UserController extends Controller
{
    public function list(){

        return UserService::list();

    }

    public function register(RegisterUserRequest $request){

        return UserService::register($request);

    }
}
