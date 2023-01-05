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

    <div class="row p-2 d-lg-flex justify-content-center mb-5"
        style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <div class="card col-lg-5 col-xl-5  p-3 shadow m-1">
            <div class="d-lg-flex justify-content-center">
                <div style="width: max-content; border-bottom:2px solid blue;">
                    <h4>Rincian Pemesanan</h4>
                </div>
            </div>
            <div class="card-body">
                <?php $a = 1; ?>

                @foreach ($pemesanan as $data)
                    <div style="line-height: 0.3cm">
                        <p class="mb-3" style="font-weight: bold;">Pemesanan {{ $a }}</p>
                        <p>Rute Perjalanan : {{ $data->harga->rute->awal }} - {{ $data->harga->rute->tujuan }}</p>
                        <p>Tanggal berangkat : {{ $data->tanggal_berangkat }}</p>
                        <p>Jadwal berangkat : {{ $data->jadwal->waktu }}</p>
                        <p>Nama Kapal : {{ $data->kursi->kapal->nama }}</p>
                        <p>Kode Kursi : {{ $data->kursi->nama_kursi }}</p>
                        <p>Jumlah Penumpang : {{ $data->jumlah }}</p>
                        <p>Total Pembayaran: Rp.{{ number_format($data->total) }}</p>
                        <hr>
                    </div>
                    <?php $a++; ?>
                @endforeach
            </div>
        </div>

        {{-- pembayaran --}}
        <div class="card col-lg-5 col-xl-5  p-3 shadow m-1">
            <div class="d-lg-flex justify-content-center">
                <div style="width: max-content; border-bottom:2px solid blue;">
                    <h4>Rincian Pembayaran</h4>
                </div>
            </div>
            <div class="card-body">
                <?php $a = 1; ?>

                @foreach ($pembayaran as $data)
                    <div>
                        <p class="mb-3" style="font-weight: bold;">Pembayaran {{ $a }}</p>
                        <p>ID Transaksi : {{ $data->transaksi_id }}</p>
                        <p>Tipe Payment : {{ $data->tipe_payment }}</p>
                        <p>Total Pembayaran : Rp.{{ number_format($data->total) }}</p>
                        <p>Waktu Pembayaran : {{ $data->waktu }}</p>
                        <p>PDF URL : <a target="_blank" href="{{ $data->pdf_url }}"
                                class="text-link">{{ $data->pdf_url }}</a></p>
                        <hr>
                    </div>
                    <?php $a++; ?>
                @endforeach
            </div>
        </div>
    </div>
@endsection
