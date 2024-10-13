<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function create(String $slug)
    {
        $service = Service::where('slug', $slug)->first();

        return inertia('Auth/Login', [
            'service' => $service
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'service_id' => 'required|integer',
        ]);

        $user = User::where('email', $request->email)->where('service_id', $request->service_id)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // Autentica o usuário

            $request->session()->regenerate();

            // Redireciona com base no slug do serviço
            $service = Service::select('slug')->findOrFail($request->service_id);
            $route = $service->slug . '.index';

            return redirect()->route($route);
        }

        return back()->with('error', 'As credenciais fornecidas não coincidem com nossos registros.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
