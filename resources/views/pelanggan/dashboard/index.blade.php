@extends('layouts.pelanggan')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Pemesanan Tiket</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $jumlahPemesanan }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Pembayaran Tiket</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $jumlahPembayaran }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa-solid fa-money-bill-1-wave"></i></span>
                </div>
            </div>
        </div>
    </div>
@endsection
