<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bantuan>
 */
class BantuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bantuan' => $this->faker->word(2),
            'jenis_bantuan' => $this->faker->randomElement(['Permakanan','Uang Tunai','Alat Penyandang Disabilitas','Paket Usaha','RS-RLTH']),
            'keterangan' => $this->faker->paragraph(3),
        ];
    }
}
