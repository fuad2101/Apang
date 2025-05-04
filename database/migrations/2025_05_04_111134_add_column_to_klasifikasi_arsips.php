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
            $table->string('primer');
            $table->string('sekunder');
            $table->string('tersier');
            $table->string('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klasifikasi_arsips', function (Blueprint $table) {
            //
        });
    }
};
