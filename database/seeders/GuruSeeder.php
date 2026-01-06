<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Guru 1 (Sesuai Gambar User Login)
        User::create([
            'name' => 'Budi Utomo',
            'email' => 'Budi@sekolah.id',
            'password' => Hash::make('1234'),
            'role' => 'guru',
        ]);

        // Guru 2 (Contoh tambahan)
        User::create([
            'name' => 'Tri Kusumawati',
            'email' => 'Tri@sekolah.id',
            'password' => Hash::make('4321'),
            'role' => 'guru',
        ]);
        
    }
}