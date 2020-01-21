<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;

class UserController extends Controller
{
    /**
     * @param UserRequest $request
     * @return mixed
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        return User::create($input);
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function show()
    {
        return Auth::user();
    }
}
