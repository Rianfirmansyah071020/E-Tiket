<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    //

    public function index() {
        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahTransaksi = Pembayaran::all()->sum('total');

        return view('admin.pembayaran.index', [
            'title' => 'Pembayaran | E-tiket',
            'route' => 'Dashboard / Pembayaran',
            'data' => Pembayaran::all(),
            'userLogin' => $userLogin,
            'jumlahTransaksi' => $jumlahTransaksi
        ]);
    }
}
