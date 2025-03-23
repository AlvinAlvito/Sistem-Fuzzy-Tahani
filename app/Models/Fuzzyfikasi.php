<?php

namespace App\Models;

class Fuzzyfikasi
{
    public static function fuzzifikasiAkademik($nilai)
    {
        if ($nilai <= 50) {
            return "Rendah";
        } elseif ($nilai > 50 && $nilai <= 75) {
            return "Sedang";
        } else {
            return "Tinggi";
        }
    }

    public static function fuzzifikasiMinat($nilai)
    {
        if ($nilai <= 3) {
            return "Rendah";
        } elseif ($nilai > 3 && $nilai <= 7) {
            return "Sedang";
        } else {
            return "Tinggi";
        }
    }

    public static function fuzzifikasiBakat($nilai)
    {
        if ($nilai <= 3) {
            return "Rendah";
        } elseif ($nilai > 3 && $nilai <= 7) {
            return "Sedang";
        } else {
            return "Tinggi";
        }
    }

    public static function fuzzifikasiGayaBelajar($gaya)
    {
        $kategori = [
            "Visual" => "Tinggi",
            "Auditori" => "Sedang",
            "Kinestetik" => "Rendah",
        ];

        return $kategori[$gaya] ?? "Sedang";
    }
}
