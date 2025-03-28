<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuzzyfikasi extends Model
{
    use HasFactory;

    protected $table = 'tb_fuzzyfikasi'; // Pastikan tabel benar
    protected $fillable = [
        'siswa_id', 'akademik_rendah', 'akademik_sedang', 'akademik_tinggi',
        'minat_kurang', 'minat_cukup', 'minat_tinggi',
        'bakat_kurang', 'bakat_sedang', 'bakat_baik',
        'gaya_kurang', 'gaya_baik', 'gaya_sangat_baik'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
