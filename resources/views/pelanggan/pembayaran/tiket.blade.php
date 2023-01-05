@extends('layouts.pelanggan')

@section('content')
    <style>
        .tiket {
            background: linear-gradient(rgb(13, 100, 59), black, rgb(13, 100, 59));
            border-radius: 10px;
            color: white;
        }

        .text-tiket {
            color: white;
        }
    </style>
    <div class="d-flex justify-content-center align-items-center">
        <div class="tiket p-3 card col-lg-4 col-xl-5 col-md-8 col-sm-12">
            <h3 class="text-center text-tiket">Tiket Kapal</h3>
            <hr style="color: gold;">
            <p class="text-tiket">ID Transaksi : {{ $data->transaksi_id }}</p>
            <p class="text-tiket">Nama Pemesan : {{ $data->pemesanan->pelanggan->nama }}</p>
            <p class="text-tiket">Tanggal Berangkat : {{ date('d - m - Y', strtotime($data->pemesanan->tanggal_berangkat)) }}
            </p>
            <p class="text-tiket">Nomor Kursi : {{ $data->pemesanan->kursi->nama_kursi }}</p>
            <p class="text-tiket">Jadwal : {{ $data->pemesanan->jadwal->waktu }}</p>
            <p class="text-tiket">Tipe Kelas : {{ $data->pemesanan->harga->tipe_kelas }}</p>
            <p class="text-tiket">Tipe Penumpang : {{ $data->pemesanan->harga->tipe_penumpang }}</p>
            <p class="text-tiket">Jumlah : {{ $data->pemesanan->jumlah }}</p>
            <p class="text-tiket">Total : Rp.{{ number_format($data->pemesanan->total) }}</p>
        </div>
    </div>
@endsection
