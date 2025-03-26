<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fuzzyfikasi;
use App\Http\Controllers\FuzzyfikasiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'tb_siswa';

    protected $fillable = ['nama', 'akademik', 'minat', 'bakat', 'gaya_belajar'];

    public function fuzzyfikasi()
    {
        return $this->hasOne(Fuzzyfikasi::class, 'siswa_id');
    }

    public function fuzzyQuery()
    {
        return $this->hasOne(FuzzyQuery::class, 'siswa_id');
    }

    protected static function booted()
    {
        static::created(function ($siswa) {
            // Panggil fungsi prosesFuzzifikasiPerSiswa() yang ada di dalam model Siswa
            $siswa->prosesFuzzifikasiPerSiswa($siswa);
        });
    }
       
    public function prosesFuzzifikasiPerSiswa(Siswa $siswa)
    {
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

}
