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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kendaraan')->constrained('kendaraans', 'id');
            $table->foreignId('driver')->constrained('users', 'id');
            $table->foreignId('atasan1')->constrained('users', 'id');
            $table->foreignId('atasan2')->constrained('users', 'id');
            $table->enum('approve_atasan1',['approved','rejected']);
            $table->enum('approve_atasan2',['approved','rejected']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->foreignId('asal')->constrained('regions', 'id');
            $table->foreignId('tujuan')->constrained('regions', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
