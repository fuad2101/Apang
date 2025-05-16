<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('klasifikasi_arsips',function(Blueprint $table){
            $table->string('aktif')->nullable()->change();
            $table->string('inaktif')->nullable()->change();
            $table->string('kode_fungsi')->nullable()->change();
            $table->string('fungsi')->nullable()->change();
            $table->string('kegiatan')->nullable()->change();
            $table->string('kode_kegiatan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
