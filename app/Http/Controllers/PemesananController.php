<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PemesananController extends Controller
{
    //

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);


        return view('admin.pemesanan.index', [
            'title' => 'Pemesanan | E-tiket',
            'route' => 'Dashboard / Pemesanan ',
            'userLogin' => $userLogin,
            'pemesanan' => Pemesanan::all()
        ]);
    }

    public function cetak() {

        $data = Pemesanan::all();

        $tanggal = Carbon::now()->isoFormat('dddd D MMMM Y');

        $pdf = PDF::loadView('admin.pemesanan.cetak' , ['data' => $data, 'tanggal' => $tanggal])->setPaper('A4', 'landscape');

        return $pdf->stream('Laporan-Data-Pemesanan.pdf');
    }
}