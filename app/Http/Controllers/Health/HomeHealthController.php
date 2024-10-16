<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use App\Models\Service;
class HomeHealthController extends Controller
{
    public function index()
    {
        $service = Service::where('slug', 'health')->with(['plans'])->first();

        return inertia('Dashboard/Home', [
            'service' => $service
        ]);
    }
}
