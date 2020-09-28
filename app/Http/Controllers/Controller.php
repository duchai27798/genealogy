<?php

namespace App\Http\Controllers;

use App\classes\UserSession;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function setUserSession(Request $request, $user)
    {
        $userSession = new UserSession($user->name, $user->email, $user->role_id);
        $request->session()->put('userSession', $userSession);
    }

    protected function getUserSession(Request $request)
    {
        return $request->session()->get('userSession', null);
    }

    protected function clearUserSession(Request $request) {
        $request->session()->forget('userSession');
    }
}
