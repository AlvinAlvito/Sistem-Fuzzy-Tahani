<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        Siswa::create([
            'nama' => 'Ahmad Fauzan',
            'akademik' => 85,
            'minat' => 90,
            'bakat' => 80,
            'gaya_belajar' => 70,
        ]);

        Siswa::create([
            'nama' => 'Rina Amelia',
            'akademik' => 60,
            'minat' => 70,
            'bakat' => 65,
            'gaya_belajar' => 80,
        ]);
    }
}
