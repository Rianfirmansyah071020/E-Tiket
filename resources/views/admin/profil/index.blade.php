@extends('layouts.admin')

@section('content')
    <div class="row card shadow p-4">
        <h5>Profil Admin <span class="text-info">{{ $data->nama }}</span></h5>
        <hr>
        <div class="d-lg-flex d-xl-flex justify-content-center">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1  d-lg-flex justify-content-center">
                <div class="card">
                    <img src="/storage/admin/{{ $data->gambar }}" alt="{{ $data->gambar }}" class="img-card-top img-profil">
                </div>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Email : {{ $data->email }}</li>
                    <li class="list-group-item">Password : {{ $data->password }}</li>
                    <li class="list-group-item">Nama Lengkap : {{ $data->nama }}</li>
                    <li class="list-group-item">Jenis Kelamin : {{ $data->jekel }}</li>
                </ul>
            </div>
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Alamat : {{ $data->alamat }}</li>
                    <li class="list-group-item">Tanggal / Tahun Lahir : {{ $data->tgl_lahir }}</li>
                    <li class="list-group-item">Nomor HP : {{ $data->nohp }}</li>
                </ul>
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-start">
            <a href="/admin/dashboard" class="btn btn-info mr-2">kembali</a>
            <a href="/admin/dashboard/profil/setting/{{ $data->id }}" class="btn btn-primary">setting</a>
        </div>
    </div>
@endsection
