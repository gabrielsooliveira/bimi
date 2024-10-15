<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneAuthenticateController extends Controller
{
    public function create()
    {
        $service = Service::where('slug', 'phone')->first();
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

        if (Auth::guard('phone')->attempt($credentials)) {
            return redirect()->intended('phone/dashboard');
        }

        return back()->with([
            'error' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function logout()
    {
        Auth::guard('phone')->logout();
        return redirect()->route('phone.create.login')->with('status', 'Desconectado com sucesso!');
    }
}
