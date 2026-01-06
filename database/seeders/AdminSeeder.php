<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 1 akun Admin Utama
        User::create([
            'name' => 'Hadhie',
            'email' => 'hadhie@sekolah.id',
            'password' => Hash::make('hadhieganteng'), 
            'role' => 'admin',
        ]);
        
        // Jika ingin menambah admin lain, bisa tambahkan di sini
    }
}