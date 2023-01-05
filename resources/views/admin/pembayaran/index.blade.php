@extends('layouts.admin')

@section('content')
    <div class="row card shadow p-3">
        <h4>Kelola Data Pembayaran Tiket Pelanggan</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Pembayaran Tiket Pelanggan</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Pelanggan</th>
                                    <th class="text-center">Transaksi ID</th>
                                    <th class="text-center">PDF URL</th>
                                    <th class="text-center">Tipe Payment</th>
                                    <th class="text-center">Status Pesan</th>
                                    <th class="text-center">Status Transaksi</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $row->pemesanan->pelanggan->nama }}</td>
                                        <td>{{ $row->transaksi_id }}</td>
                                        <td><a target="_blank" href="{{ $row->pdf_url }}">{{ $row->pdf_url }}</a></td>
                                        <td>{{ $row->tipe_payment }}</td>
                                        <td>{{ $row->status_pesan }}</td>
                                        <td>{{ $row->status_transaksi }}</td>
                                        <td>Rp.{{ number_format($row->total) }}</td>
                                        <td>{{ $row->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Pelanggan</th>
                                    <th class="text-center">Transaksi ID</th>
                                    <th class="text-center">PDF URL</th>
                                    <th class="text-center">Tipe Payment</th>
                                    <th class="text-center">Status Pesan</th>
                                    <th class="text-center">Status Transaksi</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Waktu</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
