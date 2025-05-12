<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Siswa;

class PdfController extends Controller
{
    public function cetakPDF()
    {
        $siswa = Siswa::with('fuzzyfikasiQuery')->get();

        $pdf = Pdf::loadView('cetak.rekomendasi', ['siswa' => $siswa]);

        return $pdf->download('Rekomendasi Siswa.pdf');
    }
}
