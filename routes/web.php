<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\Pages\{AuthController, DepositController, MiscController};
use App\Http\Controllers\WalletController;
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

Route::middleware(['role:admin'])->group(function(){
    Route::get('/account/admin', [MiscController::class, 'admin_dashboard']);
    Route::get('/account/admin/profile', [MiscController::class, 'admin_profile']);
});

Route::middleware(['role:admin|client'])->group(function(){
    Route::prefix('auth')->group(function() {
        Route::prefix('wallet')->group(function() {
            Route::post('/add', [WalletController::class, 'add']);
            Route::post('/delete/{wallet}', [WalletController::class, 'destroy']);
        });
    });
});