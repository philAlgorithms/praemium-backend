<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\Pages\{AuthController, DepositController, MiscController};
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::middleware(['web'])->group(function(){
        Route::post('/login', LoginController::class);
        Route::post('/signup', [RegisterController::class, 'registerClient']);
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);
Route::prefix('account')->group(function() {
    // Route::get('/', [AuthController::class, 'dashboard']);
});

Route::middleware(['role:client'])->group(function(){
    Route::get('/account', [MiscController::class, 'dashboard']);
    Route::get('/subscribe', [DepositController::class, 'subscribe']);
    Route::get('/profile', [MiscController::class, 'profile']);
    Route::prefix('deposits')->group(function() {
        // 
    });
});