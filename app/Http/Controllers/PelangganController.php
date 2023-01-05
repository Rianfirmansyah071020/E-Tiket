<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    //

    public function index() {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();

        return view('admin.pelanggan.index', [
            'title' => 'Pelanggan | E-tiket',
            'route' => 'Dashboard / Pelanggan',
            'data' => Pelanggan::all(),
            'userLogin' => $userLogin,
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }



    public function detail($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();

        return view('admin.pelanggan.detail', [
            'title' => 'Pelanggan | E-tiket',
            'route' => 'Dashboard / Pelanggan / Detail',
            'data' => Pelanggan::find($id),
            'userLogin' => $userLogin,
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }


    public function delete($email) {

        $idUser = User::all()->where('email' , $email)->value('id');
        $dataUser = User::find($idUser);

        $idPelanggan = Pelanggan::all()->where('email', $email)->value('id');
        $dataPelanggan = Pelanggan::find($idPelanggan);

        $deleteUser = $dataUser->delete();
        $deletePelanggan = $dataPelanggan->delete();

        Storage::delete('/public/pelanggan/' . $dataPelanggan->gambar);

        if($deletePelanggan && $deleteUser) {

            return redirect('/admin/dashboard/kelolapelanggan')->with('success', 'Delete data pelanggan berhasil');
        }else {

            return redirect('/admin/dashboard/kelolapelanggan')->with('success', 'Delete data pelanggan gagal');
        }
    }


    public function update($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);
        $jumlahPemesanan = Pemesanan::all()->count();

        return view('admin.pelanggan.update', [
            'title' => 'Pelanggan | E-tiket',
            'route' => 'Dashboard / Pelanggan / Update',
            'data' => Pelanggan::find($id),
            'userLogin' => $userLogin,
            'pemesanan' => Pemesanan::all()->where('status', 'belum'),
            'jumlahPemesanan' => Pemesanan::all()->where('status', 'belum')->count()
        ]);
    }


    public function update_aksi(Request $request, $id, $email){

        $validasi = $request->validate([
            'nama' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png'
        ]);


        $dataPelanggan = Pelanggan::find($id);
        $idUser = User::all()->where('email', $email)->value('id');
        $dataUser = User::find($idUser);


            if($request->file('gambar')) {
                $namaGambar = $request->file('gambar');
                $namaGambar->storeAs('/public/pelanggan', $namaGambar->hashName());
                $namaGambar = $namaGambar->hashName();

                Storage::delete('/public/pelanggan/' . $dataPelanggan->gambar);
            }else {
                $namaGambar = $request->gambarLama;
            }

            if($request->password) {
                $password = Hash::make($request->password);

            }else {
                $password = $dataPelanggan->password;
            }

        $updateAdmin = $dataPelanggan->update([
            'nama' => $request->nama,
            'jekel' => $request->jekel,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'nohp' => $request->nohp,
            'gambar' => $namaGambar
        ]);


        $updateUser = $dataUser->update([
            'password' => $password
        ]);


        if($updateAdmin && $updateUser) {

            return redirect('/admin/dashboard/kelolapelanggan')->with('success', 'Update data pelanggan berhasil');
        }else {

            return redirect('/admin/dashboard/kelolapelanggan')->with('success', 'Update data pelanggan gagal');
        }

    }



    public function cetak() {

        $data = Pelanggan::all();

        $tanggal = Carbon::now()->isoFormat('dddd D MMMM Y');

        $pdf = PDF::loadView('admin.pelanggan.cetak' , ['data' => $data, 'tanggal' => $tanggal])->setPaper('A4', 'potrait');

        return $pdf->stream('Laporan-Data-Pelanggan.pdf');
    }
}