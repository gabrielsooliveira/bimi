<?php

namespace App\Http\Controllers\Energy;

use App\Http\Controllers\Controller;
use App\Models\Service;

class HomeEnergyController extends Controller
{
    public function index()
    {
        $service = Service::where('slug', 'energy')->with(['plans'])->first();
        return inertia('Dashboard/Home', [
            'service' => $service
        ]);
    }
}
