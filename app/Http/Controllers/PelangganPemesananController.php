<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Kursi;
use App\Models\Jadwal;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PelangganPemesananController extends Controller
{


    public function index(){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $p = DB::table('pemesanans')
        ->join('pembayarans', 'pemesanans.id', '=', 'pembayarans.pemesanan_id')
        ->select('pemesanans.id')
        ->where('pemesanans.pelanggan_id', $userLogin->id)->get();

    //    $datakursi = DB::table('kursis')
    //    ->join('pemesanans', 'kursis.id', '=', 'pemesanans.kursi_id')
    //    ->where('kursis.id', '=', 'pemesanans.kursi_id')
    //    ->get();


            $pembayaran = Pembayaran::all()->value('pemesanan_id');

            $idkursi = Pemesanan::all()->value('kursi_id');
            $datakursi = Kursi::all()->where('id', '!=', $idkursi);

            $tanggal_ini = date('Y-m-d');


            $kursi = Kursi::all()->where('tanggal_pesan','!=', $tanggal_ini)->where('status_pesan', '!=', 'pesan');

        return view('pelanggan.pemesanan.index', [
            'title' => 'Pemesanan | E-tiket',
            'route' => 'Dashboard / Pemesanan ',
            'userLogin' => $userLogin,
            'kursi' => $kursi,
            'jadwal' => Jadwal::all(),
            'harga' => Harga::all(),
            'pemesanan' => Pemesanan::all()->where('pelanggan_id', $idlUser)->where('status', 'belum'),
            'dataKursi' => $datakursi,
        ])->with('p', $p);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'pelanggan_id' => 'required',
            'kursi_id' => 'required',
            'jadwal_id' => 'required',
            'harga_id' => 'required',
            'tanggal_berangkat' => 'required',
            'jumlah' => 'required',
        ]);

        $dataHarga = Harga::all()->where('id', $request->harga_id)->value('harga');

        $total  = $dataHarga * $request->jumlah;

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $cek_pesan = Kursi::all()->where('id', $request->kursi_id)->where('tanggal_pesan', '=' ,$request->tanggal_berangkat)->count();


        if($cek_pesan > 0) {

            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('cek', 'Kursi Yang Anda Pilih Sudah Di Pesan Pada Tanggal Yang Sama Harap Pilih Kursi Lain Atau Tanggal Lain');
        }

        $kursi = Kursi::find($request->kursi_id);
        $kursi->update([
            'status_kursi' => 'pesan',
            'tanggal_pesan' => $request->tanggal_berangkat
        ]);

        $pesanTiket = Pemesanan::create([
            'pelanggan_id' => $idlUser,
            'kursi_id' => $request->kursi_id,
            'jadwal_id' => $request->jadwal_id,
            'harga_id' => $request->harga_id,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jumlah' => $request->jumlah,
            'total' => $total,
            'status' => 'belum'
        ]);


        if($pesanTiket) {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan Tiket Berhasil');
        }else {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan Tiket Gagal');
        }

    }


    public function update($id){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);


        return view('pelanggan.pemesanan.update', [
            'title' => 'Pemesanan | E-tiket',
            'route' => 'Dashboard / Pemesanan / Update Pemesanan',
            'userLogin' => $userLogin,
            'kursi' => Kursi::all(),
            'jadwal' => Jadwal::all(),
            'harga' => Harga::all(),
            'pemesanan' => Pemesanan::find($id)
        ]);
    }


    public function update_aksi(Request $request, $id) {


        $validasi = $request->validate([
            'pelanggan_id' => 'required',
            'kursi_id' => 'required',
            'jadwal_id' => 'required',
            'harga_id' => 'required',
            'tanggal_berangkat' => 'required',
            'jumlah' => 'required',
        ]);

        $dataHarga = Harga::all()->where('id', $request->harga_id)->value('harga');

        $total  = $dataHarga * $request->jumlah;

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        $updateTiket = Pemesanan::find($id)->update([
            'pelanggan_id' => $idlUser,
            'kursi_id' => $request->kursi_id,
            'jadwal_id' => $request->jadwal_id,
            'harga_id' => $request->harga_id,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jumlah' => $request->jumlah,
            'total' => $total
        ]);

        if($updateTiket) {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Update pemesanan tiket berhasil');
        }else {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Update pemesanan tiket gagal');
        }
    }


    public function batal($id) {

        $idKursi = Pemesanan::all()->where('id', $id)->value('kursi_id');

        $kursi = Kursi::find($idKursi);

        $kursi->update([
            'status_kursi' => null,
            'tanggal_pesan' => null
        ]);

        $batal = Pemesanan::find($id)->delete();

        if($batal) {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan berhasil di batalkan');
        }else {
            return redirect('/pelanggan/dashboard/kelolapemesanan')->with('success','Pemesanan berhasil di batalkan');
        }

    }
}
