@extends('layouts.pelanggan')

@section('content')
    <div class="row card shadow p-3">
        Pemesanan Tiket
    </div>

    <form action="/pelanggan/dashboard/kelolapemesanan/create" method="post">
        @csrf
        <div class="row card shadow p-4">
            <h5>Tambah Pemesanan</h5>
            <hr>
            <div class="d-lg-flex d-xl-flex justify-content-center">
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                    <div>
                        <label for="pelanggan_id">Nama Pemesan</label>
                        <input type="text" name="pelanggan_id" id="pelanggan_id" placeholder="masukan anda.."
                            class="form-control @error('pelanggan_id') is-invalid @enderror" required
                            value="{{ $userLogin->nama }}" readonly>
                        @error('pelanggan_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="kursi_id">Pilih Kursi Dan Kapal</label>
                        <select name="kursi_id" id="kursi_id" class="form-control">
                            <option value="">Pilih Kursi Dan Kapal</option>
                            @foreach ($dataKursi as $row)
                                <option value="{{ $row->id }}" @selected($row->id === old('kursi_id'))>Kursi ->
                                    {{ $row->nama_kursi }} || Kapal
                                    -> {{ $row->kapal->nama }}</option>
                            @endforeach
                        </select>
                        @error('kursi_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-7 col-xl-7 col-md-12 col-sm-12 m-1">
                    <div class="mt-2">
                        <label for="jadwal_id">Pilih Jadwal</label>
                        <select name="jadwal_id" id="jadwal_id" class="form-control">
                            <option value="">Pilih Jadwal</option>
                            @foreach ($jadwal as $row)
                                <option value="{{ $row->id }}" @selected($row->id === old('jadwal_id'))>{{ $row->waktu }}
                                </option>
                            @endforeach
                        </select>
                        @error('jadwal_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="harga_id">Pilih Kelas, Rute Perjalanan Dan Penumpang</label>
                        <select name="harga_id" id="harga_id" class="form-control">
                            <option value="">Pilih Kelas, Rute Perjalanan Dan Penumpang</option>
                            @foreach ($harga as $row)
                                <option value="{{ $row->id }}" @selected($row->id === old('harga_id'))>Kelas
                                    ({{ $row->tipe_kelas }})
                                    || Rute
                                    ({{ $row->rute->awal }} -
                                    {{ $row->rute->tujuan }})
                                    || Penumpang ({{ $row->tipe_penumpang }})</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            Keterangan </br> Dewasa / Usia 13 Tahun Ke Atas </br> Anak-Anak / Usia 2 - 12 Tahun
                        </div>
                        @error('harga_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah"
                            placeholder="masukan jumlah tiket yang anda pesan.."
                            class="form-control @error('jumlah') is-invalid @enderror" required
                            value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tanggal_berangkat">Tanggal Berangkat</label>
                        <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                            class="form-control @error('tanggal_berangkat') is-invalid @enderror" required
                            value="{{ old('tanggal_berangkat') }}">
                        @error('tanggal_berangkat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="reset" class="btn btn-success mr-2">reset</button>
                        <button type="submit" class="btn btn-info">pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Pemesanan Tiket {{ $userLogin->nama }}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
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
                                @foreach ($pemesanan as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $row->pelanggan->nama }}</td>
                                        <td class="text-center">{{ $row->kursi->kapal->nama }}</td>
                                        <td class="text-center">{{ $row->kursi->nama_kursi }}</td>
                                        <td class="text-center">{{ $row->harga->tipe_penumpang }}</td>
                                        <td class="text-center">{{ $row->harga->tipe_kelas }}</td>
                                        <td class="text-center">{{ $row->jadwal->waktu }}</td>
                                        <td class="text-center">{{ $row->tanggal_berangkat }}</td>
                                        <td class="text-center">{{ $row->harga->rute->awal }} -
                                            {{ $row->harga->rute->tujuan }}</td>

                                        <td class="text-right">{{ number_format($row->harga->harga) }}</td>
                                        <td class="text-right">{{ $row->jumlah }}</td>
                                        <td class="text-right">{{ number_format($row->total) }}</td>
                                        <td class="d-flex justify-content-end">
                                            <a href="/pelanggan/dashboard/kelolapemesanan/update/{{ $row->id }}"
                                                class="btn btn-success m-1">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="/pelanggan/dashboard/kelolapemesanan/batal/{{ $row->id }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <button
                                                    onclick="return confirm('Anda yakin membatalkan pemesanan tiket ini ?')"
                                                    type="submit" class="btn btn-danger m-1">
                                                    batalkan
                                                </button>
                                            </form>
                                            <a href="/pelanggan/dashboard/kelolapemesanan/bayar/{{ $row->id }}"
                                                class="btn btn-primary m-1">
                                                Bayar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
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
