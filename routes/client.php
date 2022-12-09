<?php

use App\Http\Controllers\{DepositController};
use Illuminate\Support\Facades\Route;

Route::prefix('/deposit')->group(function(){
    Route::post('/subscribe', [DepositController::class, 'subscribe']);
    Route::post('/subscribe/complete', [DepositController::class, 'completeSubscription']);
});

// Route::prefix('/plans')->group(function(){
// 	Route::get('/manage', [Page\PlanController::class, 'manage']);
// });