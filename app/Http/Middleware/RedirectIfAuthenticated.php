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
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Obtém o usuário autenticado
                $user = Auth::guard($guard)->user();

                // Redireciona com base no service_id
                return redirect($this->getHomeRouteForUser($user));
            }
        }

        return $next($request);
    }

    /**
     * Retorna a rota "home" para o usuário com base no service_id
     */
    protected function getHomeRouteForUser($user): string
    {
        switch ($user->service_id) {
            case 1:
                return route('phone.index');
            case 2:
                return route('energy.index');
            case 3:
                return route('health.index');
            default:
                return RouteServiceProvider::HOME; // Caminho padrão caso não haja um service_id correspondente
        }
    }
}
