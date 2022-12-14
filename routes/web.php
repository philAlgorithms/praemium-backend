<?php

use App\Http\Controllers\Auth\{LoginController, PasswordController, RegisterController};
use App\Http\Controllers\Pages\{AuthController, DepositController, MiscController, ReferralController, WithdrawalController};
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::prefix('auth')->group(function() {
    Route::middleware(['web'])->group(function(){
        Route::post('/login', LoginController::class);
        Route::post('/signup', [RegisterController::class, 'registerClient']);
    });
});

Route::get('/', function () {
    return Redirect::to('/index.html');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);

// CONCERNING PASSWORDS
Route::get('/forgot-password', [AuthController::class, 'forgot'])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');


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
            Route::get('/view', [DepositController::class, 'view']);
            Route::get('/view/{id}', [DepositController::class, 'details']);
        });

        Route::prefix('withdrawal')->group(function() {
            Route::get('/withdraw', [WithdrawalController::class, 'withdraw']);
            Route::get('/view', [WithdrawalController::class, 'view']);
            Route::get('/view/{id}', [WithdrawalController::class, 'details']);
        });

        Route::prefix('referral')->group(function() {
            Route::get('/earnings', [ReferralController::class, 'view']);
            // Route::get('/manage/{id}', [WithdrawalController::class, 'manage']);
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

            Route::prefix('withdrawal')->group(function() {
                Route::get('/all', [WithdrawalController::class, 'admin_view']);
                Route::get('/manage/{id}', [WithdrawalController::class, 'manage']);
            });

            Route::prefix('referral')->group(function() {
                Route::get('/earnings', [ReferralController::class, 'admin_view']);
                // Route::get('/manage/{id}', [WithdrawalController::class, 'manage']);
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
        Route::prefix('password')->group(function() {
            Route::post('/change', [PasswordController::class, 'change']);
        });
    });
});

Route::get('/signout', function(){
	Auth::logout();
	Session::flush();
	return redirect()->route('login');
});