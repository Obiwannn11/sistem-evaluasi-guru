<?php

use App\Http\Middleware\IsUser;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SkorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\UserGuruController;
use App\Http\Controllers\UserDokumenController;
use App\Http\Controllers\UserEvaluasiController;
use App\Http\Controllers\UserPenilaianController;


// CONTOH ROUTING
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('dashboard.index');
// });

// Route::get('/', [UserController::class, 'index'])->name('user.index');
// ----------------------------------------------------------------

// FIX ROUTER

// Login Routes
// Route::get('/login', function () {
//         return view('login');
//     });

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');;
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// HAK AKSES OLEH SUPER GURU / ADMIN==========================================
// Middleware Group untuk mencegah akses dashboard tanpa login
Route::middleware(['auth', IsAdmin::class])->group(function () {
    //Routes Dashboard utama
    Route::get('/dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard');
    // Guru Routes
    Route::resource('guru', GuruController::class);
    // Dokumen Routes
    Route::resource('dokumen', DokumenController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
    // Evaluasi Routes
    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');
    Route::get('/evaluasi/calculate/{guru}', [EvaluasiController::class, 'calculateFinalScore'])->name('evaluasi.calculate');
    Route::get('/evaluasi/{guru}', [EvaluasiController::class, 'show'])->name('evaluasi.show');
    Route::post('/evaluasi', [EvaluasiController::class, 'store'])->name('evaluasi.store');
    // Penilaian Routes
    Route::resource('penilaian', PenilaianController::class);
});


// Kriteria Routes
Route::resource('kriteria', KriteriaController::class)->only(['index', 'show']);


//BUATKAN MIDDLEWARE KHUSUS is_admin == false saja yang bisa akses route grup USER

Route::middleware(['auth', IsUser::class])->group(function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        //Routes Dashboard utama
        Route::get('/dashboard', function(){
            return view('user.dashboard.index');
        })->name('dashboard');
        // Guru Routes
        Route::resource('guru', UserGuruController::class);
        // Dokumen Routes
        Route::resource('dokumen', UserDokumenController::class);
        // Evaluasi Routes
        Route::get('/evaluasi', [UserEvaluasiController::class, 'index'])->name('evaluasi.index');
        // Route::get('/evaluasi/calculate/{guru}', [UserEvaluasiController::class, 'calculateFinalScore'])->name('evaluasi.calculate');
        Route::get('/evaluasi/{guru}', [UserEvaluasiController::class, 'show'])->name('evaluasi.show');
        Route::post('/evaluasi', [UserEvaluasiController::class, 'store'])->name('evaluasi.store');
        // Penilaian Routes
        Route::resource('penilaian', UserPenilaianController::class);

    });
});

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/dashboard', 'UserController@index')->name('admin.dashboard');
//     Route::get('/profile', 'UserController@edit')->name('admin.profile.edit');
//     Route::put('/profile', 'UserController@update')->name('admin.profile.update');
// });
