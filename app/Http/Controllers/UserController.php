<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class UserController extends Controller
{
    public function list(){

            $users = Cache::store('redis')->remember(
            'users:list',
            60,
            function () {
                return User::select('id', 'name', 'email')->get();
            }
        );

    return response()->json($users);
    }
}
