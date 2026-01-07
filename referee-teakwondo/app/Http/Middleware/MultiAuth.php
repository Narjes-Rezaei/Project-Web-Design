<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Set the default guard to the logged-in one
                Auth::shouldUse($guard);
                return $next($request);
            }
        }

        // هیچ کدام لاگین نیست → redirect به login
        return redirect()->route('login');
    }
}
