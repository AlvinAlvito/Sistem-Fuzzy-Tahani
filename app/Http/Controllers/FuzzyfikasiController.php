<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuzzyfikasi;
use App\Models\Siswa;
use App\Models\FuzzyfikasiQuery;

class FuzzyfikasiController extends Controller
{    
    public function index()
    {
        // Ambil semua data dari tabel tb_fuzzyfikasi
        $fuzzifikasi = Fuzzyfikasi::all();
        $data = Fuzzyfikasi::with('siswa')->get();

        return view('admin.fuzzifikasi', compact('fuzzifikasi'));
    }

    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->akademik = $request->akademik;
        $siswa->minat = $request->minat;
        $siswa->bakat = $request->bakat;
        $siswa->gaya_belajar = $request->gaya_belajar;
        $siswa->save();
    
        // Memanggil proses fuzzifikasi yang ada di Model Siswa
        $siswa->prosesFuzzifikasi();
    
        return redirect()->route('admin.fuzzifikasi')->with('success', 'Data berhasil ditambahkan dan difuzzifikasi.');
    }
    
    public function getRekomendasiCount()
    {
        $data = FuzzyfikasiQuery::selectRaw('rekomendasi, COUNT(*) as total')
            ->groupBy('rekomendasi')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    
    



}
