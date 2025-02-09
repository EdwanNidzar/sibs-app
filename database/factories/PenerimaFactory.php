<?php

namespace Database\Factories;

use App\Models\Penerima;
use App\Models\District;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenerimaFactory extends Factory
{
    protected $model = Penerima::class;

    public function definition(): array
    {
        $district = District::where('regency_id', 6310)->inRandomOrder()->first();
        $village = $district ? Village::where('district_id', $district->id)->inRandomOrder()->first() : null;

        return [
            'nik' => $this->faker->unique()->regexify('[1-9]{1}[0-9]{15}'), // 16 digit, angka pertama tidak nol
            'no_kk' => $this->faker->unique()->regexify('[1-9]{1}[0-9]{15}'), // 16 digit, angka pertama tidak nol
            'nama_lengkap' => $this->faker->name,
            'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'district_id' => optional($district)->id,
            'village_id' => optional($village)->id,
            'alamat_penerima' => $this->faker->address,
            'dtks_status' => $this->faker->randomElement(['Terdaftar', 'TidakTerdaftar']),
            'kategori' => $this->faker->randomElement(['Lansia', 'Penyandang Disabilitas', 'Yatim Piatu', 'Keluarga Miskin']),
            'status_hidup' => $this->faker->randomElement(['Hidup', 'Meninggal']),
        ];
    }
}
