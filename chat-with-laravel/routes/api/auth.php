<?php

use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::middleware(['authUser'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::post('refresh', [AuthController::class, 'refresh']);

