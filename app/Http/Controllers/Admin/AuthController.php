<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(Request $request)
    {
        $user = $this->userRepository->findUserByEmail($request->email);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $this->setUserSession($request, $user);
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('login');
    }

    public function register()
    {
        return view('admin.register', ['roles' => $this->roleRepository->getAll()]);
    }

    public function handleRegister(RegisterRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');

        $user->save();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $this->clearUserSession($request);

        return redirect()->route('login');
    }
}
