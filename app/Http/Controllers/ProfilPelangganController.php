<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilPelangganController extends Controller
{

    public function profil($id) {

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        return view('pelanggan.profil.index', [
            'title' => 'Profil | E-tiket',
            'route' => 'Dashboard / Profil',
            'data' => Pelanggan::find($id),
            'userLogin' => $userLogin
        ]);
    }


    public function setting($id) {

        $User = Auth::user();
        $idlUser = Pelanggan::all()->where('email', $User->email)->value('id');
        $userLogin = Pelanggan::find($idlUser);

        return view('pelanggan.profil.setting', [
            'title' => 'Profil | E-tiket',
            'route' => 'Dashboard / Profil / Setting',
            'data' => Pelanggan::find($id),
            'userLogin' => $userLogin
        ]);
    }



    public function setting_aksi(Request $request, $id, $email){

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

        $updatePelanggan = $dataPelanggan->update([
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


        if($updatePelanggan && $updateUser) {

            return redirect('/pelanggan/dashboard/')->with('success', 'Setting data pelanggan berhasil');
        }else {

            return redirect('/pelanggan/dashboard/')->with('success', 'Setting data pelanggan gagal');
        }

    }
}