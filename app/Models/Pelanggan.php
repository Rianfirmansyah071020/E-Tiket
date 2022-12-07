<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'password', 'nama', 'jekel', 'alamat', 'tgl_lahir', 'nohp', 'gambar'
    ];

    public function pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }

}