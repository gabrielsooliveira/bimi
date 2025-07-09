<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
        return inertia('Home');
    }

    public function dashboard()
    {
        return inertia('Dashboard/Home');
    }
}
