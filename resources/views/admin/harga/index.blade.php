@extends('layouts.admin')

@section('content')
    <div class="row card shadow p-3">
        <h4>Kelola Data Harga</h4>
    </div>
    <form action="/admin/dashboard/kelolaharga/create" method="post">
        @csrf
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
                                <option value="{{ $row->id }}" @selected($row->id === old('rute_id'))>{{ $row->awal }} -
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
                            <option value="bisnis" @selected('bisnis' === old('tipe_kelas'))>bisnis</option>
                            <option value="ekonomi" @selected('ekonomi' === old('tipe_kelas'))>ekonomi</option>
                        </select>
                        @error('tipe_kelas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tipe_penumpang">Tipe Penumpang</label>
                        <select name="tipe_penumpang" id="tipe_penumpang" class="form-control" required>
                            <option value="">Pilih Penumpang</option>
                            <option value="anak-anak" @selected('anak-anak' === old('tipe_penumpang'))>Anak-Anak</option>
                            <option value="dewasa" @selected('dewasa' === old('tipe_penumpang'))>dewasa</option>
                        </select>
                        @error('tipe_penumpang')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-1">
                            <small class="text-keterangan">
                                Dewasa / Usia 13 Tahun Ke Atas <br>
                            </small>
                            <small class="text-keterangan">
                                Anak-Anak / Usia 2 - 12 Tahun
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 m-1">
                    <div>
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" placeholder="masukan harga anda.."
                            class="form-control @error('harga') is-invalid @enderror" required value="{{ old('harga') }}">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="reset" class="btn btn-success mr-2">reset</button>
                        <button type="submit" class="btn btn-info">simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Harga</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Rute</th>
                                    <th class="text-center">Tipe Kelas</th>
                                    <th class="text-center">Tipe Penumpang</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $row->rute->awal }} - {{ $row->rute->tujuan }}</td>
                                        <td class="text-center">{{ $row->tipe_kelas }}</td>
                                        <td class="text-center">{{ $row->tipe_penumpang }}</td>
                                        <td class="text-center">{{ number_format($row->harga) }}</td>
                                        <td class="d-flex justify-content-end">

                                            <a href="/admin/dashboard/kelolaharga/update/{{ $row->id }}"
                                                class="btn btn-success m-1">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="/admin/dashboard/kelolaharga/delete/{{ $row->id }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <button onclick="return confirm('Anda yakin menghapus data ini ?')"
                                                    type="submit" class="btn btn-danger m-1">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Rute</th>
                                    <th class="text-center">Tipe Kelas</th>
                                    <th class="text-center">Tipe Penumpang</th>
                                    <th class="text-center">Harga</th>
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
