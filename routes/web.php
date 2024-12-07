<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SkorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\KriteriaController;


// CONTOH ROUTING
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard.index');
// });

// Route::get('/', [UserController::class, 'index'])->name('user.index');
// ----------------------------------------------------------------

Route::resource('/gurus', GuruController::class);
Route::resource('/kriterias', KriteriaController::class);
Route::resource('/dokumens', DokumenController::class);
Route::resource('/skors', SkorController::class);
Route::resource('/evaluasis', EvaluasiController::class);

// Route::group(['prefix' => 'dashboard'], function () {
//     Route::get('/', [UserController::class, 'home'])->name('dashboard');
// });

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/dashboard', 'UserController@index')->name('admin.dashboard');
//     Route::get('/profile', 'UserController@edit')->name('admin.profile.edit');
//     Route::put('/profile', 'UserController@update')->name('admin.profile.update');
// });
