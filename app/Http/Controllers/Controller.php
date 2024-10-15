<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\UserService;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected function getUserPlans()
    {
        $userService = UserService::where('user_id', Auth::user()->id)->first();

        if ($userService) {
            return Plan::where('service_id', $userService->service_id)->get();
        }

        return [];
    }
}
