<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\FuzzyTahani;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();

        // Lakukan fuzzifikasi untuk setiap siswa
        $dataFuzzy = $siswa->map(function ($item) {
            return [
                'nama' => $item->nama,
                'akademik' => FuzzyTahani::fuzzifikasiAkademik($item->akademik),
                'minat' => FuzzyTahani::fuzzifikasiMinat($item->minat),
                'bakat' => FuzzyTahani::fuzzifikasiBakat($item->bakat),
                'gaya_belajar' => FuzzyTahani::fuzzifikasiGayaBelajar($item->gaya_belajar),
            ];
        });

        return view('fuzzy.index', compact('dataFuzzy'));
    }
}
