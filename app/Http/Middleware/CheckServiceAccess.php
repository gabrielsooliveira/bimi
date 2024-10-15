<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckServiceAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $serviceId
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $serviceId = $request->route('service');

        if (auth()->check() && auth()->user()->hasAccessToService($serviceId)) {
            return $next($request);
        }

        return redirect('/')->withErrors('Você não tem acesso a este serviço.');
    }
}
