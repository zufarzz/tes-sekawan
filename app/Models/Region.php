<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_region'
    ];

    public function asal() {
        return $this->hasMany(Pemesanan::class, 'asal', 'id');
    }
    public function tujuan() {
        return $this->hasMany(Pemesanan::class, 'tujuan', 'id');
    }
}
