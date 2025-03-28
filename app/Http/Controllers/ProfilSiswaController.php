<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\FuzzyfikasiQuery; 
use App\Models\Fuzzyfikasi;

class ProfilSiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all(); // Ambil semua data siswa dari database
        return view('admin.profil-siswa', compact('siswas')); // Kirim ke view
    }
    public function showProfil($id)
    {
        $siswa = Siswa::with(['fuzzyfikasiQuery'])->where('id', $id)->get();
        $fuzzifikasi = Fuzzyfikasi::whereIn('siswa_id', $siswa->pluck('id'))->get();
        // Ambil data fuzzifikasi berdasarkan siswa_id  
        $fuzzifikasiQuery = FuzzyfikasiQuery::whereIn('siswa_id', $siswa->pluck('id'))->get();
    
        return view('admin.profil-siswa', compact('siswa', 'fuzzifikasi'));
    }
    
    
    public function getSiswaProfil()
    {
        // Ambil semua data siswa dengan relasi ke tabel fuzzyfikasi dan fuzzy_query
        $siswa = Siswa::with(['fuzzyfikasi', 'fuzzyQuery'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $siswa
        ]);
    }


}
