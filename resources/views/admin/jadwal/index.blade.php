@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-12 card shadow p-3 mb-1">
            <h5>Kelola Data Jadwal</h5>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-12 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolajadwal/create" method="post">
                    @csrf
                    <div class="mb-2">
                        Tambah Data Jadwal
                    </div>
                    <hr>
                    <div>
                        <label for="waktu">Waktu</label>
                        <input type="text" name="waktu" id="waktu" placeholder="masukan waktu anda.."
                            class="form-control @error('waktu') is-invalid @enderror" required value="{{ old('waktu') }}">
                        @error('waktu')
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
                <h4 class="card-title">Data Jadwal</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Jadwal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $row->waktu }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="/admin/dashboard/kelolajadwal/update/{{ $row->id }}"
                                            class="btn btn-success m-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/dashboard/kelolajadwal/delete/{{ $row->id }}"
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
                                <th class="text-center">Jadwal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
