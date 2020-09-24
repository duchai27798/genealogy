<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    public function login(Request $request)
    {
        $user = $this->userRepository->findUserByEmail($request->email);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response(['token' => $user->createToken('authToken')->accessToken], 200);
            }

            return response(['message' => 'Email or password is wrong!'], 422);
        }

        return response(['message' => 'User isn\'t existed!'], 422);
    }
}
