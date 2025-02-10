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
        Schema::create('penerima_bantuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bantuan_id');
            $table->unsignedBigInteger('penerima_id');
            $table->date('tanggal_penerimaan');
            $table->longText('dokumentasi');
            $table->timestamps();

            $table->foreign('bantuan_id')->references('id')->on('bantuans')->onDelete('cascade');
            $table->foreign('penerima_id')->references('id')->on('penerimas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuans');
    }
};
