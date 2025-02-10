<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // role seeder buat data role
        $this->call(RoleSeeder::class);

        // user seeder buat data user
        $this->call(UserSeeder::class);

        // indo region seeder buat data provinsi, kota, kecamatan, dan kelurahan
        $this->call(IndoRegionSeeder::class);

        // bantuan seeder buat data bantuan 10 dumy data
        \App\Models\Bantuan::factory(10)->create();

        // penerima seeder buat data penerima 10 dumy data
        \App\Models\Penerima::factory(10)->create();

        // penerima bantuan seeder buat data penerima bantuan 10 dumy data
        \App\Models\Rumah::factory(10)->create();
    }
}
