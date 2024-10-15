<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnergyAuthenticateController extends Controller
{
    public function create()
    {
        $service = Service::where('slug', 'energy')->first();
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

        if (Auth::guard('energy')->attempt($credentials)) {
            return redirect()->intended('energy/dashboard');
        }

        return back()->with([
            'error' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function logout()
    {
        Auth::guard('energy')->logout();
        return redirect()->route('energy.create.login')->with('status', 'Desconectado com sucesso!');
    }
}
