<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_angkutan', 
        'kepemilikan', 
        'nama_kendaraan', 
        'konsumsi_bbm', 
        'jadwal_servis'
    ];

    public function id_kendaraan() {
        return $this->hasMany(Pemesanan::class, 'id_kendaraan', 'id');
    }
}
