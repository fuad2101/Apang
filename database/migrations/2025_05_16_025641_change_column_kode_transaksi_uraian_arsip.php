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
        Schema::table('klasifikasi_arsips', function(Blueprint $table){
            $table->string('kode_transaksi')->nullable()->change();
            $table->string('transaksi')->nullable()->change();
            $table->string('uraian_arsip')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klasifikasi_arsips',function(Blueprint $table){
            // $table->dropColumn('kode_transaksi');
            // $table->dropColumn('transaksi');
            // $table->dropColumn('uraian_arsip');
        });
    }
};
