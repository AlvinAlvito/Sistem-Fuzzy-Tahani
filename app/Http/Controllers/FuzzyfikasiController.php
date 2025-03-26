<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuzzyfikasi;
use App\Models\Siswa;

class FuzzyfikasiController extends Controller
{

    public function prosesFuzzifikasi()
    {
        // Ambil semua data siswa dari tb_siswa
        $siswaList = Siswa::all();

        foreach ($siswaList as $siswa) {
            // Hitung nilai fuzzifikasi dari nilai siswa
            $fuzzifikasi = new Fuzzyfikasi();
            $fuzzifikasi->siswa_id = $siswa->id;

            // Proses Akademik
            if ($siswa->nilai_akademik <= 50) {
                $fuzzifikasi->akademik_rendah = 1;
                $fuzzifikasi->akademik_sedang = 0;
                $fuzzifikasi->akademik_tinggi = 0;
                $fuzzifikasi->akademik_linguistik = "Rendah";
            } elseif ($siswa->nilai_akademik <= 75) {
                $fuzzifikasi->akademik_rendah = (75 - $siswa->nilai_akademik) / 25;
                $fuzzifikasi->akademik_sedang = ($siswa->nilai_akademik - 50) / 25;
                $fuzzifikasi->akademik_tinggi = 0;
                $fuzzifikasi->akademik_linguistik = "Sedang";
            } else {
                $fuzzifikasi->akademik_rendah = 0;
                $fuzzifikasi->akademik_sedang = (100 - $siswa->nilai_akademik) / 25;
                $fuzzifikasi->akademik_tinggi = ($siswa->nilai_akademik - 75) / 25;
                $fuzzifikasi->akademik_linguistik = "Tinggi";
            }

            // Proses Minat
            if ($siswa->minat <= 40) {
                $fuzzifikasi->minat_kurang = 1;
                $fuzzifikasi->minat_cukup = 0;
                $fuzzifikasi->minat_tinggi = 0;
                $fuzzifikasi->minat_linguistik = "Kurang";
            } elseif ($siswa->minat <= 70) {
                $fuzzifikasi->minat_kurang = (70 - $siswa->minat) / 30;
                $fuzzifikasi->minat_cukup = ($siswa->minat - 40) / 30;
                $fuzzifikasi->minat_tinggi = 0;
                $fuzzifikasi->minat_linguistik = "Cukup";
            } else {
                $fuzzifikasi->minat_kurang = 0;
                $fuzzifikasi->minat_cukup = (100 - $siswa->minat) / 30;
                $fuzzifikasi->minat_tinggi = ($siswa->minat - 70) / 30;
                $fuzzifikasi->minat_linguistik = "Tinggi";
            }

            // Proses Bakat
            if ($siswa->bakat <= 40) {
                $fuzzifikasi->bakat_kurang = 1;
                $fuzzifikasi->bakat_sedang = 0;
                $fuzzifikasi->bakat_baik = 0;
                $fuzzifikasi->bakat_linguistik = "Kurang";
            } elseif ($siswa->bakat <= 70) {
                $fuzzifikasi->bakat_kurang = (70 - $siswa->bakat) / 30;
                $fuzzifikasi->bakat_sedang = ($siswa->bakat - 40) / 30;
                $fuzzifikasi->bakat_baik = 0;
                $fuzzifikasi->bakat_linguistik = "Sedang";
            } else {
                $fuzzifikasi->bakat_kurang = 0;
                $fuzzifikasi->bakat_sedang = (100 - $siswa->bakat) / 30;
                $fuzzifikasi->bakat_baik = ($siswa->bakat - 70) / 30;
                $fuzzifikasi->bakat_linguistik = "Baik";
            }

            // Proses Gaya Belajar
            if ($siswa->gaya_belajar <= 40) {
                $fuzzifikasi->gaya_kurang_baik = 1;
                $fuzzifikasi->gaya_baik = 0;
                $fuzzifikasi->gaya_sangat_baik = 0;
                $fuzzifikasi->gaya_linguistik = "Kurang Baik";
            } elseif ($siswa->gaya_belajar <= 70) {
                $fuzzifikasi->gaya_kurang_baik = (70 - $siswa->gaya_belajar) / 30;
                $fuzzifikasi->gaya_baik = ($siswa->gaya_belajar - 40) / 30;
                $fuzzifikasi->gaya_sangat_baik = 0;
                $fuzzifikasi->gaya_linguistik = "Baik";
            } else {
                $fuzzifikasi->gaya_kurang_baik = 0;
                $fuzzifikasi->gaya_baik = (100 - $siswa->gaya_belajar) / 30;
                $fuzzifikasi->gaya_sangat_baik = ($siswa->gaya_belajar - 70) / 30;
                $fuzzifikasi->gaya_linguistik = "Sangat Baik";
            }


            $fuzzifikasi->save();
        }

        return response()->json(["message" => "Proses fuzzifikasi selesai"]);
    }
    public function index()
    {
        // Ambil semua data dari tabel tb_fuzzyfikasi
        $fuzzifikasi = Fuzzyfikasi::all();
        $data = Fuzzyfikasi::with('siswa')->get();


        return view('admin.fuzzifikasi', compact('fuzzifikasi'));
    }

    public function store(Request $request)
    {
        // Simpan data siswa
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->akademik = $request->akademik;
        $siswa->minat = $request->minat;
        $siswa->bakat = $request->bakat;
        $siswa->gaya_belajar = $request->gaya_belajar;
        $siswa->save();

        // Cek apakah fuzzifikasi berhasil diproses
        try {
            $this->prosesFuzzifikasi($siswa);
            return redirect()->route('admin.fuzzifikasi')->with('success', 'Data berhasil ditambahkan dan difuzzifikasi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error dalam fuzzifikasi: ' . $e->getMessage());
        }
    }




}
