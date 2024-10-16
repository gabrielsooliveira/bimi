<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if ($request->is('energy/*') || $request->is('energy')) {
                return route('energy.login');
            }

            if ($request->is('phone/*') || $request->is('phone')) {
                return route('phone.login');
            }

            if ($request->is('health/*') || $request->is('health')) {
                return route('health.login');
            }
        }

        return null;
    }
}
