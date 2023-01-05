<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Kursi;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    //

    public function index(){

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();


        return view('admin.pemesanan.index', [
            'title' => 'Pemesanan | E-tiket',
            'route' => 'Dashboard / Pemesanan ',
            'userLogin' => $userLogin,
            'pemesananData' => Pemesanan::all(),
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }

    public function cetak() {

        $data = Pemesanan::all();

        $tanggal = Carbon::now()->isoFormat('dddd D MMMM Y');

        $pdf = PDF::loadView('admin.pemesanan.cetak' , ['data' => $data, 'tanggal' => $tanggal])->setPaper('A4', 'landscape');

        return $pdf->stream('Laporan-Data-Pemesanan.pdf');
    }


    public function selesai($id) {

        $pemesanan = Pemesanan::find($id);

        $idKursi = Pemesanan::all()->where('id', $id)->value('kursi_id');
        $kursi = Kursi::find($idKursi);

        $kursi->update([
            'status_kursi' => null,
            'tanggal_pesan' => null
        ]);

        $statusPemesanan = $pemesanan->update([
            'status' => 'selesai'
        ]);


        if($statusPemesanan) {

            return redirect('/admin/dashboard/kelolapemesanan')->with('success', 'Pemesanan berhasil diselesaikan');
        }
    }
}