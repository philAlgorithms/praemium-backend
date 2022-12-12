<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\Pages\{AuthController, DepositController, MiscController, WithdrawalController};
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::middleware(['web'])->group(function(){
        Route::post('/login', LoginController::class);
        Route::post('/signup', [RegisterController::class, 'registerClient']);
    });
});

Route::get('/', function () {
    return Redirect::to('/index.html');
});

Route::get('/login', [AuthController::class, 'login']);
Route::prefix('account')->group(function() {
    // Route::get('/', [AuthController::class, 'dashboard']);
});

Route::middleware(['role:client'])->group(function(){
    
    Route::get('/subscribe', [DepositController::class, 'subscribe']);
    Route::get('/profile', [MiscController::class, 'profile']);
    Route::prefix('/account')->group(function() {
        Route::get('/', [MiscController::class, 'dashboard']);
        Route::prefix('deposit')->group(function() {
            Route::get('/', [DepositController::class, 'deposit']);
        });

        Route::prefix('withdrawal')->group(function() {
            Route::get('/withdraw', [WithdrawalController::class, 'withdraw']);
        });
    });
});

Route::middleware(['role:admin'])->group(function(){
    
    Route::prefix('account')->group(function() {
        Route::prefix('admin')->group(function() {
            Route::prefix('deposit')->group(function() {
                Route::get('/all', [DepositController::class, 'admin_view']);
                Route::get('/manage/{id}', [DepositController::class, 'manage']);
            });
        });
    });
    Route::get('/account/admin', [MiscController::class, 'admin_dashboard']);
    Route::get('/account/admin/profile', [MiscController::class, 'admin_profile']);
});

Route::middleware(['role:admin|client'])->group(function(){
    Route::prefix('auth')->group(function() {
        Route::prefix('deposit')->group(function() {
            Route::post('/all', [DepositController::class, 'admin_view']);
        });
        Route::prefix('wallet')->group(function() {
            Route::post('/add', [WalletController::class, 'add']);
            Route::post('/delete/{wallet}', [WalletController::class, 'destroy']);
        });
    });
});