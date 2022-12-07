@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-12 card shadow p-3 mb-1">
            <h5>Kelola Rute Perjalanan</h5>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-12p-4 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolarute/create" method="post">
                    @csrf
                    <div class="mb-2">
                        Tambah Data Rute
                    </div>
                    <hr>
                    <div>
                        <label for="awal">Pelabuhan Awal</label>
                        <input type="text" name="awal" id="awal" placeholder="masukan awal anda.."
                            class="form-control @error('awal') is-invalid @enderror" required value="{{ old('awal') }}">
                        @error('awal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tujuan">Pelabuhan Tujuan</label>
                        <input type="text" name="tujuan" id="tujuan" placeholder="masukan tujuan anda.."
                            class="form-control @error('tujuan') is-invalid @enderror" required value="{{ old('tujuan') }}">
                        @error('tujuan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <button type="reset" class="btn btn-info mr-2">reset</button>
                        <button type="submit" class="btn btn-success ">simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-7 col-xl-7 col-md-12 card shadow p-4 m-1">
            <div class="card-body">
                <h4 class="card-title">Data Rute</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Pelabuhan Awal</th>
                                <th class="text-center">Pelabuhan Tujuan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->awal }}</td>
                                    <td>{{ $row->tujuan }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="/admin/dashboard/kelolarute/update/{{ $row->id }}"
                                            class="btn btn-success m-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/dashboard/kelolarute/delete/{{ $row->id }}"
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
                                <th class="text-center">Pelabuhan Awal</th>
                                <th class="text-center">Pelabuhan Tujuan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
