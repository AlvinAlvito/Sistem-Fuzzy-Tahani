<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\FuzzyfikasiController;
use App\Http\Controllers\FuzzyfikasiQueryController;
use App\Http\Controllers\ProfilSiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SiswaMiddleware;

// **Login & Logout**
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// **Route untuk Admin**
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/fuzzifikasi', [FuzzyfikasiController::class, 'index']);
    Route::get('/proses-fuzzifikasi', [FuzzyfikasiController::class, 'prosesFuzzifikasi']);
    Route::get('/rekomendasi', [FuzzyfikasiQueryController::class, 'index'])->name('admin.rekomendasi');
    Route::get('/data-siswa', [SiswaController::class, 'index']);
    Route::get('/profil-siswa/{id}', [ProfilSiswaController::class, 'showProfil'])->name('siswa.profil');

    // CRUD Siswa
    Route::resource('siswa', SiswaController::class);
});

// **Route untuk Siswa**
Route::middleware(['auth', SiswaMiddleware::class])->prefix('siswa')->group(function () {
    Route::get('/', function () {
        return view('siswa.index');
    })->name('siswa.dashboard');

    Route::get('/fuzzifikasi', [FuzzyfikasiController::class, 'index']);
    Route::get('/proses-fuzzifikasi', [FuzzyfikasiController::class, 'prosesFuzzifikasi']);
    Route::get('/rekomendasi', [FuzzyfikasiQueryController::class, 'index'])->name('admin.rekomendasi');
    Route::get('/data-siswa', [SiswaController::class, 'index']);
    Route::get('/profil-siswa/{id}', [ProfilSiswaController::class, 'showProfil'])->name('siswa.profil');

    // CRUD Siswa
    Route::resource('siswa', SiswaController::class);
});

// **Route Tambahan**
Route::get('/rekomendasi-count', [FuzzyfikasiController::class, 'getRekomendasiCount']);
