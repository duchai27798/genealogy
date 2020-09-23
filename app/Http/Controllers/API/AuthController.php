<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $request['password'] = bcrypt($request['password']);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = User::create($request->toArray());

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response(['token' => $user->createToken('authToken')->accessToken], 200);
            }
        }

        return response(['message' => 'Email or password is wrong!'], 422);
    }

    public function logout($request)
    {
        $token = $request->user()->token;
        $token->revoke();
        return response(['message' => 'You have been successfully logged out!']);
    }
}
