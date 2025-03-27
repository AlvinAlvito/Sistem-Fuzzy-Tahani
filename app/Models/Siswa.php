<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fuzzyfikasi;
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

    public function prosesFuzzifikasiPerSiswa()
    {
        $fuzzifikasi = Fuzzyfikasi::firstOrNew(['siswa_id' => $this->id]); // Ambil atau buat data baru
        $fuzzifikasi->siswa_id = $this->id;
    
        // Konfigurasi batas fuzzifikasi
        $batas = [
            'akademik' => [50, 75, 90],
            'minat' => [30, 60, 80],
            'bakat' => [30, 60, 80],
            'gaya_belajar' => [40, 70, 90]
        ];
    
        // Fuzzifikasi Akademik
        $x = $this->akademik;
        $low = $batas['akademik'][0];
        $med = $batas['akademik'][1];
        $high = $batas['akademik'][2];
        $fuzzifikasi->akademik_rendah = ($x <= $low) ? 1 : (($x <= $med) ? ($med - $x) / ($med - $low) : 0);
        $fuzzifikasi->akademik_sedang = ($x <= $low || $x >= $high) ? 0 : (($x <= $med) ? ($x - $low) / ($med - $low) : ($high - $x) / ($high - $med));
        $fuzzifikasi->akademik_tinggi = ($x <= $med) ? 0 : (($x <= $high) ? ($x - $med) / ($high - $med) : 1);
    
        // Fuzzifikasi Minat
        $x = $this->minat;
        $low = $batas['minat'][0];
        $med = $batas['minat'][1];
        $high = $batas['minat'][2];
        $fuzzifikasi->minat_kurang = ($x <= $low) ? 1 : (($x <= $med) ? ($med - $x) / ($med - $low) : 0);
        $fuzzifikasi->minat_cukup = ($x <= $low || $x >= $high) ? 0 : (($x <= $med) ? ($x - $low) / ($med - $low) : ($high - $x) / ($high - $med));
        $fuzzifikasi->minat_tinggi = ($x <= $med) ? 0 : (($x <= $high) ? ($x - $med) / ($high - $med) : 1);
    
        // Fuzzifikasi Bakat
        $x = $this->bakat;
        $low = $batas['bakat'][0];
        $med = $batas['bakat'][1];
        $high = $batas['bakat'][2];
        $fuzzifikasi->bakat_kurang = ($x <= $low) ? 1 : (($x <= $med) ? ($med - $x) / ($med - $low) : 0);
        $fuzzifikasi->bakat_sedang = ($x <= $low || $x >= $high) ? 0 : (($x <= $med) ? ($x - $low) / ($med - $low) : ($high - $x) / ($high - $med));
        $fuzzifikasi->bakat_baik = ($x <= $med) ? 0 : (($x <= $high) ? ($x - $med) / ($high - $med) : 1);
    
        // Fuzzifikasi Gaya Belajar
        $x = $this->gaya_belajar;
        $low = $batas['gaya_belajar'][0];
        $med = $batas['gaya_belajar'][1];
        $high = $batas['gaya_belajar'][2];
        $fuzzifikasi->gaya_kurang_baik = ($x <= $low) ? 1 : (($x <= $med) ? ($med - $x) / ($med - $low) : 0);
        $fuzzifikasi->gaya_baik = ($x <= $low || $x >= $high) ? 0 : (($x <= $med) ? ($x - $low) / ($med - $low) : ($high - $x) / ($high - $med));
        $fuzzifikasi->gaya_sangat_baik = ($x <= $med) ? 0 : (($x <= $high) ? ($x - $med) / ($high - $med) : 1);
    
        // Simpan hasil fuzzifikasi
        $fuzzifikasi->save();
    }
    
    


}
