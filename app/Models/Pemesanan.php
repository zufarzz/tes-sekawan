<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kendaraan',
        'driver',
        'atasan1',
        'atasan2',
        'approve_atasan1',
        'approve_atasan2',
        'tanggal_mulai',
        'tanggal_akhir',
        'asal',
        'tujuan'
    ];

    public function id_kendaraan() {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id');
    }
    public function driver() {
        return $this->belongsTo(User::class, 'driver', 'id');
    }
    public function atasan1() {
        return $this->belongsTo(User::class, 'atasan1', 'id');
    }
    public function atasan2() {
        return $this->belongsTo(User::class, 'atasan2', 'id');
    }
    public function asal() {
        return $this->belongsTo(Region::class, 'asal', 'id');
    }
    public function tujuan() {
        return $this->belongsTo(Region::class, 'tujuan', 'id');
    }

    protected $with = [
        'id_kendaraan',
        'driver',
        'atasan1',
        'atasan2',
        'asal',
        'tujuan'
    ];
    
}
