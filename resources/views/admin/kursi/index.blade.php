@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-12 card shadow p-3 mb-1">
            <h5>Kelola Data Kursi</h5>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-12p-4 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolakursi/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        Tambah Data Kursi
                    </div>
                    <hr>
                    <div>
                        <label for="kapal_id">Nama Kapal</label>
                        <select name="kapal_id" id="kapal_id" class="form-control">
                            <option value="">Pilih kapal</option>
                            @foreach ($kapal as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                        @error('kapal_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="nama_kursi">Nama Kursi</label>
                        <input type="text" name="nama_kursi" id="nama_kursi" placeholder="masukan nama_kursi anda.."
                            class="form-control @error('nama_kursi') is-invalid @enderror" required
                            value="{{ old('nama_kursi') }}">
                        @error('nama_kursi')
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
                <h4 class="card-title">Data Kursi</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama kapal</th>
                                <th class="text-center">Nama Kursi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->kapal->nama }}</td>
                                    <td>{{ $row->nama_kursi }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="/admin/dashboard/kelolakursi/update/{{ $row->id }}"
                                            class="btn btn-success m-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/dashboard/kelolakursi/delete/{{ $row->id }}"
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
                                <th class="text-center">Nama kapal</th>
                                <th class="text-center">Nama Kursi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
