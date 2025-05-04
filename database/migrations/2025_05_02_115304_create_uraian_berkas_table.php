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
        Schema::create('uraian_arsips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arsip_id')->constrained('arsips')->cascadeOnDelete();
            $table->string('no_berkas');
            $table->string('isi_informasi');
            $table->string('jumlah');
            $table->string('jenis');
            $table->string('tanggal');
            $table->string('tingkat');
            $table->string('lokasi_unit');
            $table->string('sifat_arsip');
            $table->string('kondisi');
            $table->string('media');
            $table->string('ket');
            $table->string('jenis_arsip');
            $table->string('nilai_guna');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uraian_berkas');
    }
};
