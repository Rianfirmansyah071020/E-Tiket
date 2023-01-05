@extends('layouts.admin')

@section('content')
    <div class="row p-3">
        <a href="/admin/dashboard/kelolapemesanan/cetak" target="_blank" class="btn btn-info">cetak</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Pemesanan Tiket</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Status Pembayaran</th>
                                    <th class="text-center">Nama Pemesan</th>
                                    <th class="text-center">Nama Kapal</th>
                                    <th class="text-center">Nama Kursi</th>
                                    <th class="text-center">Tipe Penumpang</th>
                                    <th class="text-center">Tipe Kelas</th>
                                    <th class="text-center">Jadwal</th>
                                    <th class="text-center">Tanggal Berangkat</th>
                                    <th class="text-center">Rute Pejalanan</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah Penumpang</th>
                                    <th class="text-center">Total Pembayaran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesananData as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        @if ($row->status === 'bayar')
                                            <td class="text-center bg-danger text-white">Sudah dibayar</td>
                                        @elseif ($row->status === 'belum')
                                            <td class="text-center bg-warning">Belum dibayar</td>
                                        @else
                                            <td class="text-center bg-info text-white">Selesai</td>
                                        @endif
                                        <td>{{ $row->pelanggan->nama }}</td>
                                        <td class="text-center">{{ $row->kursi->kapal->nama }}</td>
                                        <td class="text-center">{{ $row->kursi->nama_kursi }}</td>
                                        <td class="text-center">{{ $row->harga->tipe_penumpang }}</td>
                                        <td class="text-center">{{ $row->harga->tipe_kelas }}</td>
                                        <td class="text-center">{{ $row->jadwal->waktu }}</td>
                                        <td class="text-center">{{ $row->tanggal_berangkat }}</td>
                                        <td class="text-center">{{ $row->harga->rute->awal }} -
                                            {{ $row->harga->rute->tujuan }}</td>
                                        <td class="text-right">Rp.{{ number_format($row->harga->harga) }}</td>
                                        <td class="text-right">{{ $row->jumlah }}</td>
                                        <td class="text-right">Rp.{{ number_format($row->total) }}</td>

                                        @if ($row->status === 'bayar')
                                            <td class="d-flex justify-content-end">
                                                <a href="/admin/dashboard/kelolapemesanan/selesai/{{ $row->id }}"
                                                    class="btn btn-danger m-1"
                                                    onclick="return confirm('Anda yakin menyelesaikan pemesanan ini ?')">
                                                    selesai
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Status Pembayaran</th>
                                    <th class="text-center">Nama Pemesan</th>
                                    <th class="text-center">Nama Kapal</th>
                                    <th class="text-center">Nama Kursi</th>
                                    <th class="text-center">Tipe Penumpang</th>
                                    <th class="text-center">Tipe Kelas</th>
                                    <th class="text-center">Jadwal</th>
                                    <th class="text-center">Tanggal Berangkat</th>
                                    <th class="text-center">Rute Pejalanan</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah Penumpang</th>
                                    <th class="text-center">Total Pembayaran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
