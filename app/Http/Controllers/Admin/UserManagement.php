<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Controller
{
    private $roleRepository;
    private $userRepository;

    public function __construct(RoleRepository $roleRepository, UserRepository $userRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    public function dashboard()
    {
        return view('admin.user-management.dashboard', ['route' => 'user', 'users' => $this->userRepository->getAll()]);
    }

    public function create()
    {
        return view('admin.user-management.user-editor', ['route' => 'user', 'roles' => $this->roleRepository->getAll()]);
    }

    public function handleCreate(RegisterRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');

        $user->save();

        return redirect()->route('users.management');
    }
}
