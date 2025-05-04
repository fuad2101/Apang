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
        Schema::table('arsips', function (Blueprint $table) {
            $table->string('no_berkas');
            $table->string('kode_klasifikasi');
            $table->string('uraian_berkas');
            $table->string('tanggal_berkas');
            $table->string('unit_pengolah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arsip', function (Blueprint $table) {
            //
        });
    }
};
