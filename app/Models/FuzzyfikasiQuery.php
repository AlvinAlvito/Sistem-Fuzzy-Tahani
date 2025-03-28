<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuzzyfikasiQuery extends Model
{
    use HasFactory;

    protected $table = 'tb_fuzzy_query'; // Pastikan tabel ini ada di database
    protected $fillable = ['siswa_id', 'ipa', 'ips', 'agama', 'rekomendasi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
