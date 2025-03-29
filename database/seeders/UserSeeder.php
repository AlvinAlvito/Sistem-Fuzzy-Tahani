<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'username' => 'admin',
                'name' => 'Admin User', // Tambahkan name
                'email' => 'admin@example.com', // Tambahkan email
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'siswa',
                'name' => 'Siswa User', // Tambahkan name
                'email' => 'siswa@example.com', // Tambahkan email
                'password' => Hash::make('siswa123'),
                'role' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
