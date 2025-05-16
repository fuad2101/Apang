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
        Schema::table('klasifikasi_arsips', function (Blueprint $table) {
            $table->renameColumn('primer','kode_fungsi');
            $table->renameColumn('sekunder','fungsi');
            $table->renameColumn('tersier','kode_kegiatan');
            $table->string('kegiatan');
            $table->string('kode_transaksi');
            $table->string('aktif');
            $table->string('inaktif');
            $table->string('uraian_arsip');
            $table->dropColumn('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klasifikasi_arsips', function (Blueprint $table) {
            $table->dropColumn('kode_fungsi');
            $table->dropColumn('fungsi');
            $table->dropColumn('kode_kegiatan');
            $table->dropColumn('kegiatan');
            $table->dropColumn('kode_transaksi');
            $table->dropColumn('aktif');
            $table->dropColumn('inaktif');
            $table->dropColumn('uraian_arsip');
            $table->string('deskripsi');
        });
    }
};
