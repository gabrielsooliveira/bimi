<?php

namespace App\Http\Controllers\Health;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeHealthController extends Controller
{
    public function index()
    {
        return inertia('Dashboard/Home');
    }
}
