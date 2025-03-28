<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $namaSiswa = [
            'Ahmad', 'Budi', 'Siti', 'Dewi', 'Rizky', 'Nina', 'Fajar', 'Lina', 'Zaki', 'Rina',
            'Bayu', 'Tari', 'Hendra', 'Lilis', 'Joko', 'Maya', 'Fauzan', 'Nadia', 'Aldi', 'Tina',
            'Rian', 'Dina', 'Farhan', 'Vina', 'Gilang', 'Yuli', 'Arif', 'Sari', 'Hafiz', 'Mega',
            'Rizal', 'Aulia', 'Dimas', 'Sinta', 'Zain', 'Fika', 'Adi', 'Melati', 'Johan', 'Ratna',
            'Rama', 'Putri', 'Eko', 'Indah', 'Gita', 'Haris', 'Sonia', 'Ilham', 'Citra', 'Dian'
        ];
        
        $siswaData = [];
        
        for ($i = 0; $i < 50; $i++) {
            $siswaData[] = [
                'nama' => $namaSiswa[array_rand($namaSiswa)], // Pilih nama secara acak
                'akademik' => rand(60, 100), // Nilai akademik antara 60-100
                'minat' => rand(5, 15), // Minat antara 5-15
                'bakat' => rand(5, 15), // Bakat antara 5-15
                'gaya_belajar' => rand(5, 15), // Gaya belajar antara 5-15
            ];
        }
        

        foreach ($siswaData as $data) {
            $siswa = Siswa::create($data);

            // Jalankan proses fuzzifikasi secara manual
            $siswa->prosesFuzzifikasiPerSiswa();
            $siswa->prosesFuzzifikasiQuery();
        }
    }
}
