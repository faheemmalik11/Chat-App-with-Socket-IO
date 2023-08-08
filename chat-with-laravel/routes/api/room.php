<?php
use App\Http\Controllers\RoomController;
 



Route::middleware(['authUser'])->group(function () {
    
    Route::get('/{channel}', [RoomController::class, 'index'])->name('room');
    Route::post('sendMessage', [RoomController::class, 'sendMessage']);
    Route::post('typing', [RoomController::class, 'typing']);
});

