<?php

use App\Http\Controllers\{BonusController, DepositController, WithdrawalController};
use Illuminate\Support\Facades\Route;

// CONCERNING DEPOSITS
Route::prefix('/deposit')->group(function(){
    Route::post('/approve', [DepositController::class, 'approve']);
});

// CONCERNING WithdrawalS
Route::prefix('/withdrawal')->group(function(){
    Route::post('/approve', [WithdrawalController::class, 'approve']);
});

// CONCERNING BONUSES
Route::prefix('/bonus')->group(function(){
    Route::post('/grant', [BonusController::class, 'grant']);
});