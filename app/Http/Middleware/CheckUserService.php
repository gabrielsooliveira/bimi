<?php

namespace App\Http\Middleware;

use App\Models\UserService;
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userService = UserService::where('user_id', Auth::id())
                                  ->where('service_id', $serviceId)
                                  ->first();

        if (!$userService) {
            return redirect()->back()->with('error', 'Você não tem acesso a este serviço.');
        }

        return $next($request);
    }
}
