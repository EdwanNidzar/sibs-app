<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerimas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik')->unique();
            $table->unsignedBigInteger('no_kk')->unique();
            $table->string('nama_lengkap');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('village_id');
            $table->text('alamat_penerima');
            $table->enum('dtks_status', ['Terdaftar', 'TidakTerdaftar']);
            $table->enum('kategori', ['Lansia', 'Penyandang Disabilitas', 'Yatim Piatu', 'Keluarga Miskin']);
            $table->enum('status_hidup', ['Hidup', 'Meninggal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimas');
    }
};
