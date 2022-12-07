<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;


    protected $fillable = [
        'rute_id','awal', 'tujuan'
    ];


    public function harga() {
        return $this->hasOne(Harga::class, 'rute_id');
    }
}