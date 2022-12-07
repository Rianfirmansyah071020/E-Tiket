<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $fillable = [
        'rute_id', 'tipe_kelas', 'tipe_penumpang', 'harga'
    ];


    public function rute() {
        return $this->belongsTo(Rute::class, 'rute_id');
    }

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}