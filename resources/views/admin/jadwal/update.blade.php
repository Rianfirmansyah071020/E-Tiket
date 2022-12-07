@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-lg-6 col-xl-6 col-md-12 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolajadwal/update/{{ $data->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        Update Data Jadwal
                    </div>
                    <hr>
                    <div>
                        <label for="waktu">Waktu</label>
                        <input type="text" name="waktu" id="waktu" placeholder="masukan waktu anda.."
                            class="form-control @error('waktu') is-invalid @enderror" required value="{{ $data->waktu }}">
                        @error('waktu')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <a href="/admin/dashboard/kelolajadwal" class="btn btn-info mr-2">kembali</a>
                        <button type="submit" class="btn btn-success ">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
