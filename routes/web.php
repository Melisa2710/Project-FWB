<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function() {
    return view('Admin.Dashboard');
});

Route::get('/form/login', function(){
    return view('auth.login');
});