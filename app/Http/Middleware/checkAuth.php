<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userSession = $request->session()->get('userSession', null);

        if ($userSession) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
