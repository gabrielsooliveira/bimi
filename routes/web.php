<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Core\ChatController;
use App\Http\Controllers\Core\PanelController;
use App\Http\Controllers\Energy\HomeEnergyController;
use App\Http\Controllers\Health\HomeHealthController;
use App\Http\Controllers\Phone\HomePhoneController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('panel');
    Route::get('/login/{slug}', [AuthenticateController::class, 'create'])->name('login.create');
    Route::post('/login', [AuthenticateController::class, 'login'])->name('login.store');
});

Route::middleware(['auth', 'checkUserService:1'])->group(function () {
    Route::get('/dashboard/phone/home', [HomePhoneController::class, 'index'])->name('phone.index');
});

Route::middleware(['auth', 'checkUserService:2'])->group(function () {
    Route::get('/dashboard/energy/home', [HomeEnergyController::class, 'index'])->name('energy.index');
});

Route::middleware(['auth', 'checkUserService:3'])->group(function () {
    Route::get('/dashboard/health/home', [HomeHealthController::class, 'index'])->name('health.index');
});

Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
Route::post('/chat', [ChatController::class, 'conversation'])->name('chat');
