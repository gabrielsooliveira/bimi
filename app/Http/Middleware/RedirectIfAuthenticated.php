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
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                return redirect($this->getHomeRouteForUser($user));
            }
        }

        return $next($request);
    }

    protected function getHomeRouteForUser($user): string
    {
        $servicePlan = $user->servicePlans()->first();

        if ($servicePlan) {
            switch ($servicePlan->service_id) {
                case 1:
                    return route('phone.index.home');
                case 2:
                    return route('energy.index.home');
                case 3:
                    return route('health.index.home');
            }
        }
    }
}
