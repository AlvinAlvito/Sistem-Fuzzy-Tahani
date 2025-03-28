<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\FuzzyfikasiController;
use App\Http\Controllers\FuzzyfikasiQueryController;
use App\Http\Controllers\ProfilSiswaController;


Route::prefix('admin')->group(function () {
    Route::get('/fuzzifikasi', [FuzzyfikasiController::class, 'index']);
    Route::get('/proses-fuzzifikasi', [FuzzyfikasiController::class, 'prosesFuzzifikasi']);
    Route::get('/rekomendasi', [FuzzyfikasiQueryController::class, 'index'])->name('admin.rekomendasi');
    Route::get('/data-siswa', [SiswaController::class, 'index']);
    Route::get('/profil-siswa/{id}', [ProfilSiswaController::class, 'showProfil'])->name('siswa.profil');

});

Route::get('/rekomendasi-count', [FuzzyfikasiController::class, 'getRekomendasiCount']);

Route::get('/admin', function () {
    return view('admin.index');
});

// Ubah route ini agar menggunakan controller



Route::get('/', function () {
    return view('login');
});

// Tambahkan route CRUD untuk siswa
Route::resource('siswa', SiswaController::class);





