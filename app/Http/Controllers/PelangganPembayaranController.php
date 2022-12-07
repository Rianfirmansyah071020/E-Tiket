<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganPembayaranController extends Controller
{

    public function index(){

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);
        $id = Pemesanan::all()->where('pelanggan_id', $idlUser)->value('id');

        return view('pelanggan.pembayaran.index', [
            'title' => 'Pembayaran | E-tiket',
            'route' => 'Dashboard / Pembayaran ',
            'userLogin' => $userLogin,
            'pembayaran' => Pembayaran::all()->where('pelanggan_id', $idlUser),
        ]);
    }


    public function bayar($id) {

        $pemesanan = Pemesanan::find($id);
        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);
        $kode = Pembayaran::all()->where('pelanggan_id', $idlUser)->value('id');

         // Set your Merchant Server Key
         \Midtrans\Config::$serverKey = 'SB-Mid-server-ZeDZdp8r8jOPAATdCcmnHzTh';
         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
         \Midtrans\Config::$isProduction = false;
         // Set sanitization on (default)
         \Midtrans\Config::$isSanitized = true;
         // Set 3DS transaction for credit card to true
         \Midtrans\Config::$is3ds = true;

         $params = array(
             'transaction_details' => array(
                 'order_id' => rand(),
                 'gross_amount' => 10000,
             ),
             'item_details' => array(
                 [
                     'id'=> $pemesanan->id,
                     'price'=> $pemesanan->harga->harga,
                     'quantity'=> $pemesanan->jumlah,
                     'name'=> $pemesanan->harga->tipe_kelas,
                 ],
             ),
             'customer_details' => array(
                 'first_name' => $userLogin->nama,
                 'email' => $userLogin->email,
                 'phone' => $userLogin->nohp,
             ),
         );

             $snapToken = \Midtrans\Snap::getSnapToken($params);


             return view('pelanggan.pembayaran.bayar', [
                 'snap_token' => $snapToken,
                 'title' => 'Pembayaran | E-tiket',
                 'userLogin' => $userLogin,
                 'route' => 'Dashboard / Pembayaran Tiket',
                 'id' => $pemesanan->id,
             ]);
    }


    public function create(Request $request, $id) {

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);


        $json = json_decode($request->get('json'));

        $bayar = Pembayaran::create([
            'pemesanan_id' => $id,
            'pelanggan_id' => $userLogin->id,
            'transaksi_id' => $json->transaction_id,
            'status_pesan' => $json->status_message,
            'status_transaksi' => $json->transaction_status,
            'tipe_payment' => $json->payment_type,
            'waktu' => $json->transaction_time,
            'pdf_url' => isset($json->pdf_url) ? $json->pdf_url : null,
            'total' => $json->gross_amount
        ]);

        if($bayar) {
            return redirect('/pelanggan/dashboard/kelolapembayaran')->with('success', 'Pembayaran berhasil');
        }else {
            return redirect('/pelanggan/dashboard/kelolapembayaran')->with('success', 'Pembayaran gagal');
        }
    }
}