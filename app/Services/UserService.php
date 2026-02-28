<?php

namespace App\Services;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Jobs\SendWelcomeEmailJob;

class UserService {

    public static function list(){

            $users = Cache::store('redis')->remember(
            'users:list',
            60,
            function () {
                return User::select('id', 'name', 'email')->get();
            }
        );

    return response()->json($users);
    }

    public static function register(RegisterUserRequest $request){

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        SendWelcomeEmailJob::dispatch($user);

        return response()->json($user, 201);

    }


}
