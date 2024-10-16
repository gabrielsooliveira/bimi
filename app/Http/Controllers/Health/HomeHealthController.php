<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeHealthController extends Controller
{
    public function index()
    {
        $service = Service::where('slug', 'health')->first();

        return inertia('Dashboard/Home', [
            'service' => $service
        ]);
    }
}
