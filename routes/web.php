<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/admin', function () {
    return view('admin.index');
});

// Ubah route ini agar menggunakan controller
Route::get('/admin/data-siswa', [SiswaController::class, 'index']);

Route::get('/admin/fuzzifikasi', function () {
    return view('admin.fuzzifikasi');
});

Route::get('/admin/rekomendasi', function () {
    return view('admin.rekomendasi');
});

Route::get('/', function () {
    return view('login');
});

// Tambahkan route CRUD untuk siswa
Route::resource('siswa', SiswaController::class);





