<?php

namespace App\Http\Controllers\Energy;

use App\Http\Controllers\Controller;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeEnergyController extends Controller
{
    public function index()
    {
        $plans = $this->getUserPlans();

        return inertia('Dashboard/Home', [
            'plans' => $plans,
        ]);
    }
}
