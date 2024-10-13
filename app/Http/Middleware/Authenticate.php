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
            // Captura o slug da URL, se disponível
            $slug = $request->route('slug');

            // Se o slug estiver presente, usa ele na rota de redirecionamento
            return route('login.create', ['slug' => $slug]);
        }

        return null;
    }
}
