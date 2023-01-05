<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kapal_id', 'nama_kursi', 'status_kursi', 'tanggal_pesan'
    ];

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }

    public function kapal() {
        return $this->belongsTo(Kapal::class, 'kapal_id');
    }
}