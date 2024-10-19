<?php

namespace App\Http\Middleware;

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
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('energy/*') && Auth::guard('energy')->check()) {
            return redirect()->route('energy.index.home');
        }

        if ($request->is('phone/*') && Auth::guard('phone')->check()) {
            return redirect()->route('phone.index.home');
        }

        if ($request->is('health/*') && Auth::guard('health')->check()) {
            return redirect()->route('health.index.home');
        }

        return $next($request);
    }
}

