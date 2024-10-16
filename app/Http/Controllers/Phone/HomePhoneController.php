<?php

namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use App\Models\Service;

class HomePhoneController extends Controller
{
    public function index()
    {
        $service = Service::where('slug', 'phone')->with(['plans'])->first();

        return inertia('Dashboard/Home', [
            'service' => $service
        ]);
    }
}
