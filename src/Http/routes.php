<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'Role:admin'], function() {
    // Route::resource('roles',App\Http\Controllers\RoleController::class);
    //  Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
});
