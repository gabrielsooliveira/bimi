<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return inertia('App', [
            'services' => $services
        ]);
    }
}
