<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->getRedirectUrl());
            }
        }

        return $next($request);
    }

    private function getRedirectUrl()
    {
        $user = Auth::user();

        if ($user->role_id == 1 || $user->role_id == 2) { // Admins
            return route('admin.dashboard');
        } elseif ($user->role_id == 3) { // User
            return route('user.dashboard');
        } elseif ($user->role_id == 4) { // Manufacturer
            return route('manufacturer.dashboard');
        }

        return '/';
    }
}
