<?php

namespace App\Http\Controllers\Energy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeEnergyController extends Controller
{
    public function index()
    {
        return inertia('Dashboard/Home');
    }
}
