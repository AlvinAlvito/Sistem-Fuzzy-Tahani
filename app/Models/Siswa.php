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
    
        // Fuzzifikasi Akademik
        $x = $siswa->akademik;
        $fuzzifikasi->akademik_rendah = ($x <= 50) ? 1 : (($x <= 75) ? (75 - $x) / (75 - 50) : 0);
        $fuzzifikasi->akademik_sedang = ($x <= 50 || $x >= 90) ? 0 : (($x <= 75) ? ($x - 50) / (75 - 50) : (90 - $x) / (90 - 75));
        $fuzzifikasi->akademik_tinggi = ($x <= 75) ? 0 : (($x <= 90) ? ($x - 75) / (90 - 75) : 1);
    
        // Fuzzifikasi Minat
        $x = $siswa->minat;
        $fuzzifikasi->minat_kurang = ($x <= 30) ? 1 : (($x <= 60) ? (60 - $x) / (60 - 30) : 0);
        $fuzzifikasi->minat_cukup = ($x <= 30 || $x >= 80) ? 0 : (($x <= 60) ? ($x - 30) / (60 - 30) : (80 - $x) / (80 - 60));
        $fuzzifikasi->minat_tinggi = ($x <= 60) ? 0 : (($x <= 80) ? ($x - 60) / (80 - 60) : 1);
    
        // Fuzzifikasi Bakat
        $x = $siswa->bakat;
        $fuzzifikasi->bakat_kurang = ($x <= 30) ? 1 : (($x <= 60) ? (60 - $x) / (60 - 30) : 0);
        $fuzzifikasi->bakat_sedang = ($x <= 30 || $x >= 80) ? 0 : (($x <= 60) ? ($x - 30) / (60 - 30) : (80 - $x) / (80 - 60));
        $fuzzifikasi->bakat_baik = ($x <= 60) ? 0 : (($x <= 80) ? ($x - 60) / (80 - 60) : 1);
    
        // Fuzzifikasi Gaya Belajar
        $x = $siswa->gaya_belajar;
        $fuzzifikasi->gaya_kurang_baik = ($x <= 40) ? 1 : (($x <= 70) ? (70 - $x) / (70 - 40) : 0);
        $fuzzifikasi->gaya_baik = ($x <= 40 || $x >= 90) ? 0 : (($x <= 70) ? ($x - 40) / (70 - 40) : (90 - $x) / (90 - 70));
        $fuzzifikasi->gaya_sangat_baik = ($x <= 70) ? 0 : (($x <= 90) ? ($x - 70) / (90 - 70) : 1);
    
        // Simpan hasil fuzzifikasi
        $fuzzifikasi->save();
    }
    


}
