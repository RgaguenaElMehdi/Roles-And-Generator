<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:developer'], function() {
        Route::get('/admin', function () {
            return view('home');
        });
});
