<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfilAdminController extends Controller
{

    public function profil($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        return view('admin.profil.index', [
            'title' => 'Profil | E-tiket',
            'route' => 'Dashboard / Profil',
            'data' => Admin::find($id),
            'userLogin' => $userLogin
        ]);
    }


    public function setting($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        return view('admin.profil.setting', [
            'title' => 'Profil | E-tiket',
            'route' => 'Dashboard / Profil / Setting',
            'data' => Admin::find($id),
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


        $dataAdmin = Admin::find($id);
        $idUser = User::all()->where('email', $email)->value('id');
        $dataUser = User::find($idUser);


            if($request->file('gambar')) {
                $namaGambar = $request->file('gambar');
                $namaGambar->storeAs('/public/admin', $namaGambar->hashName());
                $namaGambar = $namaGambar->hashName();

                Storage::delete('/public/admin/' . $dataAdmin->gambar);
            }else {
                $namaGambar = $request->gambarLama;
            }

            if($request->password) {
                $password = Hash::make($request->password);

            }else {
                $password = $dataAdmin->password;
            }

        $updateAdmin = $dataAdmin->update([
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

            return redirect('/admin/dashboard/')->with('success', 'Setting data admin berhasil');
        }else {

            return redirect('/admin/dashboard/')->with('success', 'Setting data admin gagal');
        }

    }
}