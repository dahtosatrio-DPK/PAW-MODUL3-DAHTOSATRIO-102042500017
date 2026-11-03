<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Pengguna LMS (1 Dosen & 1 Mahasiswa)

        // TODO 1: Buat akun awal untuk Dosen
        User::updateOrCreate(
            ['email' => 'dosen@celoe-lms.com'],
            [
                'name' => 'Dosen LMS',
                'password' => Hash::make('password123'),
                'role' => 'Dosen',
                'nomor_induk' => 'DSN001',
            ]
        );

        // TODO 2: Buat akun awal untuk Mahasiswa
        User::updateOrCreate(
            ['email' => 'mahasiswa@celoe-lms.com'],
            [
                'name' => 'Mahasiswa LMS',
                'password' => Hash::make('password123'),
                'role' => 'Mahasiswa',
                'nomor_induk' => 'MHS001',
            ]
        );
    }
}