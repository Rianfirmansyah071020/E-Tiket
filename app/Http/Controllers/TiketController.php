<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{


    public function index($id) {

        $data = Pembayaran::find($id);

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        return view('pelanggan.pembayaran.tiket', [
            'title' => 'Tiket | E-tiket',
            'route' => 'Dashboard / Tiket',
            'data' => $data,
            'userLogin' => $userLogin,
        ]);
    }
}