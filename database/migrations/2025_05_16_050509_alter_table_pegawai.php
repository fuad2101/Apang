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
        Schema::table('pegawais', function (Blueprint $table) {
            $table->renameColumn('nama','petugas');
            $table->renameColumn('jabatan','jabatan_petugas');
            $table->renameColumn('pangkat','unit_petugas');
            $table->dropColumn('substansi');
            $table->dropColumn('ttl');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            //
        });
    }
};
