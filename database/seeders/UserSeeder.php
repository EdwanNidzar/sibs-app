<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $pegawai = User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $pegawai->assignRole('pegawai');

        $pengguna = User::create([
            'name' => 'Pengguna',
            'email' => 'pengguna@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $pengguna->assignRole('pengguna');
    }
}
