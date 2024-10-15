<?php

namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePhoneController extends Controller
{
    public function index()
    {
        $plans = $this->getUserPlans();

        return inertia('Dashboard/Home', [
            'plans' => $plans,
        ]);
    }
}
