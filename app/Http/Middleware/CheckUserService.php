<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $serviceId
     * @return mixed
     */
    public function handle(Request $request, Closure $next, int $serviceId)
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            $user = Auth::user();

            // Verifica se o user tem o service_id correspondente
            if ($user->service_id != $serviceId) {
                // Redireciona para uma página de erro ou de acesso negado
                return redirect()->route('home')->with('error', 'Acesso negado ao serviço.');
            }
        } else {
            // Se o usuário não está logado, redireciona para a página de login
            return redirect()->route('login.create', ['slug' => $request->route('slug')]);
        }

        return $next($request);
    }
}
