<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthAuthenticateController extends Controller
{
    public function create()
    {
        $service = Service::where('slug', 'health')->first();
        return inertia('Auth/Login', [
            'service' => $service
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('health')->attempt($credentials)) {
            return redirect()->intended('health/dashboard');
        }

        return back()->with([
            'error' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function logout()
    {
        Auth::guard('health')->logout();
        return redirect()->route('health.create.login')->with('status', 'Desconectado com sucesso!');
    }
}
