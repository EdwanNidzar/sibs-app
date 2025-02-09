<?php

namespace Database\Factories;

use App\Models\Penerima;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class RumahFactory extends Factory
{
    public function definition(): array
    {
        // Pastikan direktori penyimpanan tersedia
        Storage::disk('public')->makeDirectory('rumah/documents');

        // Buat nama file unik dengan UUID
        $fileName = $this->faker->uuid . '.pdf';

        // Simpan file palsu ke dalam storage
        $filePath = 'rumah/documents/' . $fileName;
        UploadedFile::fake()->create($fileName, 100)->storeAs('rumah/documents', $fileName, 'public');

        return [
            'penerima_id' => Penerima::inRandomOrder()->value('id'),
            'alamat_rumah' => $this->faker->address,
            'kondisi_rumah' => $this->faker->randomElement(['Layak', 'Tidak layak']),
            'document_pendukung' => $filePath, // Simpan path yang benar
            'status_bantuan' => $this->faker->randomElement(['yes', 'no']),
        ];
    }
}
