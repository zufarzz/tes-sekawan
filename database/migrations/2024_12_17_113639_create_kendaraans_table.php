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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->text('nama_kendaraan');
            $table->enum('jenis_angkutan',['orang','barang']);
            $table->enum('kepemilikan',['perusahaan','sewa']);
            $table->integer('konsumsi_bbm');
            $table->dateTime('jadwal_servis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
