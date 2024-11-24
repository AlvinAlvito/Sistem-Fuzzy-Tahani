<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin/data-siswa', function () {
    return view('admin.data-siswa');
});
Route::get('/admin/fuzzifikasi', function () {
    return view('admin.fuzzifikasi');
});Route::get('/admin/rekomendasi', function () {
    return view('admin.rekomendasi');
});

Route::get('/', function () {
    return view('login');
});
