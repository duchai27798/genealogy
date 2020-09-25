<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(Request $request)
    {
        // dd($request->all());

        $user = $this->userRepository->findUserByEmail($request->email);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('login');
    }
}
