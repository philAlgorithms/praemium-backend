<?php

use App\Http\Controllers\{DepositController, WithdrawalController};
use Illuminate\Support\Facades\Route;

// CONCERNING DEPOSITS
Route::prefix('/deposit')->group(function(){
    Route::post('/approve', [DepositController::class, 'approve']);
});

// CONCERNING WithdrawalS
Route::prefix('/withdrawal')->group(function(){
    Route::post('/approve', [WithdrawalController::class, 'approve']);
});