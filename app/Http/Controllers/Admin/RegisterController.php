<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request)
    {
        $request['password'] = bcrypt($request['password']);

        $user = $this->userRepository->create($request->all());

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }
}
