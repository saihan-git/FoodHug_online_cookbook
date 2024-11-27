<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    //    public function handle($request, Closure $next, ...$guards)
    //    {
    //        if (Auth::check()) {
    //            $user = Auth::user();
    //
    //            // Redirect based on user role
    //            if ($user->hasRole('admin')) {
    //                return redirect()->route('admin.login');
    //            }
    //
    //            if ($user->hasRole('chef')) {
    //                return redirect()->route('chef.login');
    //            }
    //        }
    //
    //        return $next($request);
    //    }

    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }
    
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return Auth::shouldUse($guard);
            }
        }
    
        $this->unauthenticated($request, $guards);
    }
    
}



    //protected function redirectTo($request)
    //{
    //    if (! $request->expectsJson()) {
    //        if ($request->is('chef') || $request->is('chef/*')) {
    //            return route('chef.login');
    //        }
    //        return route('login');
    //    }
    //}