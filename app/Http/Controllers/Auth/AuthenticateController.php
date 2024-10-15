<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
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
            'service_id' => 'required|exists:services,id',
        ]);

        $user = User::where('email', $request->email)->first();
        $userService = UserService::where('user_id', $user->id)->where('service_id', $request->service_id)->first();

        if ($userService && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            switch ($request->service_id) {
                case 1:
                    return redirect()->route('phone.index');
                case 2:
                    return redirect()->route('energy.index');
                case 3:
                    return redirect()->route('health.index');
            }
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
