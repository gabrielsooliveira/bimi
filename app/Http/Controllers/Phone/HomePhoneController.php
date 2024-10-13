<?php

namespace App\Http\Controllers\Phone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePhoneController extends Controller
{
    public function index()
    {
        return inertia('Dashboard/Home');
    }
}
