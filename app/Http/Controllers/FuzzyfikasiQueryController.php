<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class FuzzyfikasiQueryController extends Controller
{
    public function index()
    {
        // Ambil semua data siswa beserta hasil fuzzifikasi query
        $siswa = Siswa::with('fuzzyfikasiQuery')->get();

        return view('admin.rekomendasi', compact('siswa'));
    }
}
