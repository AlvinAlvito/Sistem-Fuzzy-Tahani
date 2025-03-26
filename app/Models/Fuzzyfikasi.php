<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuzzyfikasi extends Model
{
    use HasFactory;

    protected $table = 'tb_fuzzyfikasi';

    protected $fillable = [
        'nama',
        'akademik_rendah', 'akademik_sedang', 'akademik_tinggi', 'akademik_linguistik',
        'minat_kurang', 'minat_cukup', 'minat_tinggi', 'minat_linguistik',
        'bakat_kurang', 'bakat_sedang', 'bakat_baik', 'bakat_linguistik',
        'gaya_kurang_baik', 'gaya_baik', 'gaya_sangat_baik', 'gaya_linguistik',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
