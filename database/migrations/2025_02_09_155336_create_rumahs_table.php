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
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerima_id');
            $table->string('alamat_rumah');
            $table->enum('kondisi_rumah', ['Layak', 'Tidak layak']);
            $table->string('document_pendukung');
            $table->enum('status_bantuan', ['yes', 'no']);
            $table->timestamps();

            $table->foreign('penerima_id')->references('id')->on('penerimas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahs');
    }
};
