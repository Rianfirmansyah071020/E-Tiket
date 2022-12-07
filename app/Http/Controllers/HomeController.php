<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index() {

        return view('umum.index', [
            'title' => 'Home | E-tiket',
            'route' => 'home',
            'jadwal' => Jadwal::all()
        ]);
    }


    public function daftar() {

        return view('umum.daftar', [
            'title' => 'Daftar | E-tiket',
            'route' => 'daftar'
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'email' => 'required|unique:pelanggans,email',
            'password' => 'required',
            'nama' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('/public/pelanggan/' , $gambar->hashName());

        $tambahPelanggan = Pelanggan::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'jekel' => $request->jekel,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'nohp' => $request->nohp,
            'gambar' => $gambar->hashName()
        ]);


        $tambahUser = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'pelanggan'
        ]);


        if($tambahPelanggan && $tambahUser) {

            return redirect('/daftar')->with('success', 'Daftar berhasil');
        }else {

            return redirect('/daftar')->with('success', 'Daftar gagal');
        }
    }
}