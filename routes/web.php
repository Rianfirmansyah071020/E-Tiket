<?php

use App\Models\Pemesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\kirimEmailController;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ProfilPelangganController;
use App\Http\Controllers\PelangganDashboardController;
use App\Http\Controllers\PelangganPemesananController;
use App\Http\Controllers\PelangganPembayaranController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// dashboard admin
Route::get('/admin/dashboard', [DashboardAdminController::class, 'index']);

// kelola admin
Route::get('/admin/dashboard/kelolaadmin', [AdminController::class, 'index']);
Route::post('/admin/dashboard/kelolaadmin/create', [AdminController::class, 'create']);
Route::put('/admin/dashboard/kelolaadmin/delete/{email}', [AdminController::class, 'delete']);
Route::get('/admin/dashboard/kelolaadmin/detail/{id}', [AdminController::class, 'detail']);
Route::get('/admin/dashboard/kelolaadmin/update/{id}', [AdminController::class, 'update']);
Route::put('/admin/dashboard/kelolaadmin/update_aksi/{id}/{email}', [AdminController::class, 'update_aksi']);

// login dan logout
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'autentikasi']);
Route::get('/logout', [LogoutController::class, 'logout']);

// Kelola Rute
Route::get('/admin/dashboard/kelolarute', [RuteController::class, 'index']);
Route::post('/admin/dashboard/kelolarute/create', [RuteController::class, 'create']);
Route::put('/admin/dashboard/kelolarute/delete/{id}', [RuteController::class, 'delete']);
Route::get('/admin/dashboard/kelolarute/update/{id}', [RuteController::class, 'update']);
Route::put('/admin/dashboard/kelolarute/update/{id}', [RuteController::class, 'update_aksi']);

// kelola jadwal
Route::get('/admin/dashboard/kelolajadwal', [JadwalController::class, 'index']);
Route::post('/admin/dashboard/kelolajadwal/create', [JadwalController::class, 'create']);
Route::put('/admin/dashboard/kelolajadwal/delete/{id}', [JadwalController::class, 'delete']);
Route::get('/admin/dashboard/kelolajadwal/update/{id}', [JadwalController::class, 'update']);
Route::put('/admin/dashboard/kelolajadwal/update/{id}', [JadwalController::class, 'update_aksi']);

// kelola kapal
Route::get('/admin/dashboard/kelolakapal', [KapalController::class, 'index']);
Route::post('/admin/dashboard/kelolakapal/create', [KapalController::class, 'create']);
Route::put('/admin/dashboard/kelolakapal/delete/{id}', [KapalController::class, 'delete']);
Route::get('/admin/dashboard/kelolakapal/detail/{id}', [KapalController::class, 'detail']);
Route::get('/admin/dashboard/kelolakapal/update/{id}', [KapalController::class, 'update']);
Route::put('/admin/dashboard/kelolakapal/update/{id}', [KapalController::class, 'update_aksi']);

// kelola harga
Route::get('/admin/dashboard/kelolaharga', [HargaController::class, 'index']);
Route::post('/admin/dashboard/kelolaharga/create', [HargaController::class, 'create']);
Route::put('/admin/dashboard/kelolaharga/delete/{id}', [HargaController::class, 'delete']);
Route::get('/admin/dashboard/kelolaharga/update/{id}', [HargaController::class, 'update']);
Route::put('/admin/dashboard/kelolaharga/update/{id}', [HargaController::class, 'update_aksi']);


// kelola profil admin
Route::get('/admin/dashboard/profil/{id}', [ProfilAdminController::class, 'profil']);
Route::get('/admin/dashboard/profil/setting/{id}', [ProfilAdminController::class, 'setting']);
Route::put('/admin/dashboard/profil/setting/{id}/{email}', [ProfilAdminController::class, 'setting_aksi']);

// folder home
Route::get('/home', [HomeController::class, 'index']);
Route::get('/daftar', [HomeController::class, 'daftar']);
Route::post('/pelanggan/create', [HomeController::class, 'create']);


// dahboard pelanggan
Route::get('/pelanggan/dashboard', [PelangganDashboardController::class, 'index']);


// kelola pelanggan (admin)
Route::get('/admin/dashboard/kelolapelanggan', [PelangganController::class, 'index']);
Route::get('/admin/dashboard/kelolapelanggan/detail/{id}', [PelangganController::class, 'detail']);
Route::put('/admin/dashboard/kelolapelanggan/delete/{id}', [PelangganController::class, 'delete']);
Route::get('/admin/dashboard/kelolapelanggan/update/{id}', [PelangganController::class, 'update']);
Route::put('/admin/dashboard/kelolapelanggan/update_aksi/{id}/{email}', [PelangganController::class, 'update_aksi']);
Route::get('/admin/dashboard/kelolapelanggan/cetak', [PelangganController::class, 'cetak']);



// kelola data kursi
Route::get('/admin/dashboard/kelolakursi', [KursiController::class, 'index']);
Route::post('/admin/dashboard/kelolakursi/create', [KursiController::class, 'create']);
Route::put('/admin/dashboard/kelolakursi/delete/{id}', [KursiController::class, 'delete']);
Route::get('/admin/dashboard/kelolakursi/update/{id}', [KursiController::class, 'update']);
Route::put('/admin/dashboard/kelolakursi/update/{id}', [KursiController::class, 'update_aksi']);


// kelola pemesanan (pelanggan)
Route::get('/pelanggan/dashboard/kelolapemesanan', [PelangganPemesananController::class, 'index']);
Route::post('/pelanggan/dashboard/kelolapemesanan/create', [PelangganPemesananController::class, 'create']);
Route::get('/pelanggan/dashboard/kelolapemesanan/update/{id}', [PelangganPemesananController::class, 'update']);
Route::put('/pelanggan/dashboard/kelolapemesanan/update/{id}', [PelangganPemesananController::class, 'update_aksi']);
Route::put('/pelanggan/dashboard/kelolapemesanan/batal/{id}', [PelangganPemesananController::class, 'batal']);



// kelola profil pelanggan
Route::get('/pelanggan/dashboard/profil/{id}', [ProfilPelangganController::class, 'profil']);
Route::get('/pelanggan/dashboard/profil/setting/{id}', [ProfilPelangganController::class, 'setting']);
Route::put('/pelanggan/dashboard/profil/setting/{id}/{email}', [ProfilPelangganController::class, 'setting_aksi']);


// kelola pemesanan (admin)
Route::get('/admin/dashboard/kelolapemesanan', [PemesananController::class, 'index']);
Route::get('/admin/dashboard/kelolapemesanan/cetak', [PemesananController::class, 'cetak']);


// kelola pembayaran (pelanggan)
Route::get('/pelanggan/dashboard/kelolapembayaran', [PelangganPembayaranController::class, 'index']);
Route::get('/pelanggan/dashboard/kelolapemesanan/bayar/{id}', [PelangganPembayaranController::class, 'bayar']);
Route::post('/pelanggan/dashboard/kelolapemesanan/bayar/{id}', [PelangganPembayaranController::class, 'create']);

Route::get('/pay', [PayController::class, 'index']);


// kelola pembayaran (admin)
Route::get('/admin/dashboard/kelolapembayaran', [PembayaranController::class, 'index']);