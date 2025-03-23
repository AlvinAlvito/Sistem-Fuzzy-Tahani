<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
