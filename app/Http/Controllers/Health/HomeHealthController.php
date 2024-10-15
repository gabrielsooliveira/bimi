<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeHealthController extends Controller
{
    public function index()
    {
        $plans = Auth::guard('health')->user()->relatedPlans();
        $service = Service::where('slug', 'health')->first();

        return inertia('Dashboard/Home', [
            'plans' => $plans,
            'service' => $service
        ]);
    }
}
