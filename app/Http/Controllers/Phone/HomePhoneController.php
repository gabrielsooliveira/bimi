<?php

namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\UserPhone;
use Illuminate\Support\Facades\Auth;

class HomePhoneController extends Controller
{
    public function index()
    {
        $service = Service::where('slug', 'phone')->first();

        return inertia('Dashboard/Home', [
            'service' => $service
        ]);
    }
}
