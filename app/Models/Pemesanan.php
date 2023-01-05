<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id', 'kapal_id', 'kursi_id', 'jadwal_id', 'harga_id','tanggal_berangkat' ,'jumlah', 'total', 'status'
    ];


    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function kursi(){
        return $this->belongsTo(Kursi::class);
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }

    public function harga(){
        return $this->belongsTo(Harga::class);
    }

    public function pembayaran() {
        return $this->hasOne(Pembayaran::class);
    }
}