<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanMateriController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard.index');
// });

// Route::get('/', [UserController::class, 'index']);


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [UserController::class, 'home'])->name('dashboard');

});

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/dashboard', 'UserController@index')->name('admin.dashboard');
//     Route::get('/profile', 'UserController@edit')->name('admin.profile.edit');
//     Route::put('/profile', 'UserController@update')->name('admin.profile.update');

// });
