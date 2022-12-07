@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-12 card shadow p-3 mb-1">
            <h5>Kelola Data Kapal</h5>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-12p-4 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolakapal/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        Tambah Data Kapal
                    </div>
                    <hr>
                    <div>
                        <label for="nama">Nama Kapal</label>
                        <input type="text" name="nama" id="nama" placeholder="masukan nama anda.."
                            class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" name="kapasitas" id="kapasitas" placeholder="masukan kapasitas anda.."
                            class="form-control @error('kapasitas') is-invalid @enderror" required
                            value="{{ old('kapasitas') }}">
                        @error('kapasitas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror" required value="{{ old('gambar') }}">
                        @error('gambar')
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
                <h4 class="card-title">Data Kapal</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama kapal</th>
                                <th class="text-center">Kapasitas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->kapasitas }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="/admin/dashboard/kelolakapal/detail/{{ $row->id }}"
                                            class="btn btn-info m-1">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="/admin/dashboard/kelolakapal/update/{{ $row->id }}"
                                            class="btn btn-success m-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/dashboard/kelolakapal/delete/{{ $row->id }}"
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
                                <th class="text-center">Kapasitas</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
