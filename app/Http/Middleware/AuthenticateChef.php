<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateChef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard('chef')->check()) {
            return redirect()->route('chef.login');
        } elseif (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        } elseif (!Auth::guard('member')->check()) {
            return redirect()->route('member.login');
        }

        return $next($request);
    }
}
