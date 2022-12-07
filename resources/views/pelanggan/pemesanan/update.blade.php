@extends('layouts.pelanggan')

@section('content')
    <form action="/pelanggan/dashboard/kelolapemesanan/update/{{ $pemesanan->id }}" method="post">
        @csrf
        @method('put')
        <div class="row card shadow p-4">
            <h5>Update Pemesanan</h5>
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
                            @foreach ($kursi as $row)
                                <option value="{{ $row->id }}" @selected($row->id === $pemesanan->kursi_id)>Kursi ->
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
                                <option value="{{ $row->id }}" @selected($row->id === $pemesanan->jadwal_id)>{{ $row->waktu }}
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
                                <option value="{{ $row->id }}" @selected($row->id === $pemesanan->harga_id)>Kelas
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
                            value="{{ $pemesanan->jumlah }}">
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tanggal_berangkat">Tanggal Berangkat</label>
                        <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                            class="form-control @error('tanggal_berangkat') is-invalid @enderror" required
                            value="{{ $pemesanan->tanggal_berangkat }}">
                        @error('tanggal_berangkat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <a href="/pelanggan/dashboard/kelolapemesanan" class="btn btn-success mr-2">kembali</a>
                        <button type="submit" class="btn btn-info">pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
