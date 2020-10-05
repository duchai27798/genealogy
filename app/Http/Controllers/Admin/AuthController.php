<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $user = $this->userRepository->findUserByEmail($request->email);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $this->setUserSession($request, $user);
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('login')
            ->with('message', 'Email or password is wrong.')
            ->with('email', $request->email);
    }

    public function logout(Request $request)
    {
        $this->clearUserSession($request);

        return redirect()->route('login');
    }
}
