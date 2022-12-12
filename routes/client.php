<?php

use App\Http\Controllers\{DepositController, WithdrawalController};
use Illuminate\Support\Facades\Route;

Route::prefix('/deposit')->group(function(){
    Route::post('/', [DepositController::class, 'deposit']);
    Route::post('/subscribe', [DepositController::class, 'init']);
    Route::post('/subscribe/complete', [DepositController::class, 'completeSubscription']);
});

Route::prefix('/withdrawal')->group(function(){
    Route::post('/submit', [WithdrawalController::class, 'submit']);
});

// Route::prefix('/plans')->group(function(){
// 	Route::get('/manage', [Page\PlanController::class, 'manage']);
// });