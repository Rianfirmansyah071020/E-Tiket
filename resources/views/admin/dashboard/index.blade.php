@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-6">
                <div class="card-body">
                    <h3 class="card-title text-white">Admin</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $jumlahAdmin }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa-solid fa-user-secret"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-5">
                <div class="card-body">
                    <h3 class="card-title text-white">Pelanggan</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $jumlahPelanggan }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa-solid fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-7">
                <div class="card-body">
                    <h3 class="card-title text-white">Pemesanan Tiket</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $jumlahPemesanan }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa-solid fa-ticket"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-9">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Transaksi</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">Rp.{{ number_format($jumlahTransaksi) }},00-</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa-sharp fa-solid fa-money-bill"></i></span>
                </div>
            </div>
        </div>
    </div>
@endsection
