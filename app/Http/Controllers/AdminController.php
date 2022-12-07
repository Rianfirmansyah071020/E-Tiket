<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    public function index() {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        return view('admin.admin.index', [
            'title' => 'Admin | E-tiket',
            'route' => 'Dashboard / Admin',
            'data' => Admin::all(),
            'userLogin' => $userLogin
        ]);
    }


    public function create(Request $request) {

        $validasi = $request->validate([
            'email' => 'required|unique:admins,email',
            'password' => 'required',
            'nama' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('/public/admin/' , $gambar->hashName());

        $tambahAdmin = Admin::create([
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
            'level' => 'admin'
        ]);


        if($tambahAdmin && $tambahUser) {

            return redirect('/admin/dashboard/kelolaadmin')->with('success', 'Data admin berhasil ditambahkan');
        }else {

            return redirect('/admin/dashboard/kelolaadmin')->with('success', 'Data admin gagal ditambahkan');
        }
    }


    public function delete($email) {

        $idUser = User::all()->where('email' , $email)->value('id');
        $dataUser = User::find($idUser);

        $idAdmin = Admin::all()->where('email', $email)->value('id');
        $dataAdmin = Admin::find($idAdmin);

        $deleteUser = $dataUser->delete();
        $deleteAdmin = $dataAdmin->delete();

        Storage::delete('/public/admin/' . $dataAdmin->gambar);

        if($deleteAdmin && $deleteUser) {

            return redirect('/admin/dashboard/kelolaadmin')->with('success', 'Delete data admin berhasil');
        }else {

            return redirect('/admin/dashboard/kelolaadmin')->with('success', 'Delete data admin gagal');
        }
    }



    public function detail($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        return view('admin.admin.detail', [
            'title' => 'Admin | E-tiket',
            'route' => 'Dashboard / Admin / Detail',
            'data' => Admin::find($id),
            'userLogin' => $userLogin
        ]);
    }


    public function update($id) {

        $User = Auth::user();
        $idlUser = Admin::all()->where('email', $User->email)->value('id');
        $userLogin = Admin::find($idlUser);

        return view('admin.admin.update', [
            'title' => 'Admin | E-tiket',
            'route' => 'Dashboard / Admin / Update',
            'data' => Admin::find($id),
            'userLogin' => $userLogin
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

            return redirect('/admin/dashboard/kelolaadmin')->with('success', 'Update data admin berhasil');
        }else {

            return redirect('/admin/dashboard/kelolaadmin')->with('success', 'Update data admin gagal');
        }

    }
}