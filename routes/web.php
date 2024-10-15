<?php

use App\Http\Controllers\Auth\EnergyAuthenticateController;
use App\Http\Controllers\Auth\HealthAuthenticateController;
use App\Http\Controllers\Auth\PhoneAuthenticateController;
use App\Http\Controllers\Core\PanelController;
use App\Http\Controllers\Energy\HomeEnergyController;
use App\Http\Controllers\Health\HomeHealthController;
use App\Http\Controllers\Phone\HomePhoneController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PanelController::class, 'index'])->name('panel');

// Rotas para Phone
Route::prefix('phone')->group(function () {
    Route::get('login', [PhoneAuthenticateController::class, 'create'])->name('phone.create.login');
    Route::post('login', [PhoneAuthenticateController::class, 'login'])->name('phone.login');
    Route::post('logout', [PhoneAuthenticateController::class, 'logout'])->name('phone.logout');

    Route::middleware(['auth:phone'])->group(function () {
        Route::get('/dashboard', [HomePhoneController::class, 'index']);
    });
});

// Rotas para Energy
Route::prefix('energy')->group(function () {
    Route::get('login', [EnergyAuthenticateController::class, 'create'])->name('energy.create.login');
    Route::post('login', [EnergyAuthenticateController::class, 'login'])->name('energy.login');
    Route::post('logout', [EnergyAuthenticateController::class, 'logout'])->name('energy.logout');

    Route::middleware(['auth:energy'])->group(function () {
        Route::get('/dashboard', [HomeEnergyController::class, 'index']);
    });
});

// Rotas para Heath
Route::prefix('health')->group(function () {
    Route::get('login', [HealthAuthenticateController::class, 'create'])->name('health.create.login');
    Route::post('login', [HealthAuthenticateController::class, 'login'])->name('health.login');
    Route::post('logout', [HealthAuthenticateController::class, 'logout'])->name('health.logout');

    Route::middleware(['auth:health'])->group(function () {
        Route::get('/dashboard', [HomeHealthController::class, 'index']);
    });
});
