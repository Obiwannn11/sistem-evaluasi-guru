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

// FIX ROUTER
// Guru Routes
Route::resource('guru', GuruController::class);

// Kriteria Routes
Route::resource('kriteria', KriteriaController::class)->only(['index', 'show']);

// Dokumen Routes
Route::resource('dokumen', DokumenController::class)->only(['index', 'create', 'store', 'show', 'destroy']);

// Evaluasi Routes
Route::resource('evaluasi', EvaluasiController::class)->only(['index', 'show', 'create', 'store']);

// Penilaian Routes
Route::resource('penilaian', PenilaianController::class)->only(['edit', 'update', 'show']);


// Route::resource('/gurus', GuruController::class);
// Route::resource('/kriterias', KriteriaController::class);
// Route::resource('/dokumens', DokumenController::class);
// Route::resource('/skors', SkorController::class);
// Route::resource('/evaluasis', EvaluasiController::class);

// Route::group(['prefix' => 'dashboard'], function () {
//     Route::get('/', [UserController::class, 'home'])->name('dashboard');
// });

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/dashboard', 'UserController@index')->name('admin.dashboard');
//     Route::get('/profile', 'UserController@edit')->name('admin.profile.edit');
//     Route::put('/profile', 'UserController@update')->name('admin.profile.update');
// });
