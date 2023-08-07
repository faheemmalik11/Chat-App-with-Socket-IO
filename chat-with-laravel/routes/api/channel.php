<?php




Route::middleware(['authUser'])->group(function () {
    
    Route::get('/', function () {
        return view('channel');
    });

});

