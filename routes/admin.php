<?php

use App\Http\Controllers\{DepositController};
use Illuminate\Support\Facades\Route;

// CONCERNING DEPOSITS
Route::prefix('/deposit')->group(function(){
    Route::post('/approve', [DepositController::class, 'approve']);
});