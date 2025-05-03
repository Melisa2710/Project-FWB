<?php

use Illuminate\Support\Facades\Route;

Route::middleware([''])->group(function () {
    Route::resource('/menus', MenuController::class)->middleware('role:admin');
    Route::resource('/order', OrderController::class)->middleware('role:customer,chef');
});

