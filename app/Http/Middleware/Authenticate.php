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
            if ($request->is('energy/*')) {
                return route('energy.create.login');
            }

            if ($request->is('phone/*')) {
                return route('phone.create.login');
            }

            if ($request->is('health/*')) {
                return route('health.create.login');
            }
        }

        return null;
    }
}

