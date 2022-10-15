<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;



Route::controller(GameController::class)->group(function () {
    Route::get('game-info', 'index');
    Route::post('game-info', 'store');
    Route::post('checking-winner', 'checkingWinner');
});




