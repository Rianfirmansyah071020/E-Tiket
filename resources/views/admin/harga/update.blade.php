@extends('layouts.admin')

@section('content')
    <div class="row card shadow p-3">
        <h4>Update Data Harga</h4>
    </div>
    <form action="/admin/dashboard/kelolaharga/update/{{ $data->id }}" method="post">
        @csrf
        @method('put')
        <div class="row card shadow p-4">
            <h5>Tambah data harga</h5>
            <hr>
            <div class="d-lg-flex d-xl-flex justify-content-center">
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 m-1">
                    <div>
                        <label for="rute_id">Rute</label>
                        <select name="rute_id" id="rute_id" class="form-control" required>
                            <option value="">Pilih rute</option>
                            @foreach ($rute as $row)
                                <option value="{{ $row->id }}" @selected($row->id === $data->rute_id)>{{ $row->awal }} -
                                    {{ $row->tujuan }}</option>
                            @endforeach
                        </select>
                        @error('rute_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tipe_kelas">Tipe Kelas</label>
                        <select name="tipe_kelas" id="tipe_kelas" class="form-control" required>
                            <option value="">Pilih kelas</option>
                            <option value="bisnis" @selected('bisnis' === $data->tipe_kelas)>bisnis</option>
                            <option value="ekonomi" @selected('ekonomi' === $data->tipe_kelas)>ekonomi</option>
                        </select>
                        @error('tipe_kelas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tipe_penumpang">Tipe Penumpang</label>
                        <select name="tipe_penumpang" id="tipe_penumpang" class="form-control" required>
                            <option value="">Pilih Penumpang</option>
                            <option value="anak-anak" @selected('anak-anak' === $data->tipe_penumpang)>Anak-Anak</option>
                            <option value="dewasa" @selected('dewasa' === $data->tipe_penumpang)>dewasa</option>
                        </select>
                        @error('tipe_penumpang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-1">
                            <small class="text-keterangan">
                                Dewasa / Usia 13 Tahun Ke Atas <br>
                            </small>
                            <small class="text-keterangan">
                                Anak-Anak / Usia 1 bulan - 2 Tahun
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 m-1">
                    <div>
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" placeholder="masukan harga anda.."
                            class="form-control @error('harga') is-invalid @enderror" required value="{{ $data->harga }}">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <a href="/admin/dashboard/kelolaharga" class="btn btn-success mr-2">kembali</a>
                        <button type="submit" class="btn btn-info">simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
