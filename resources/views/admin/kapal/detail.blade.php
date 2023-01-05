@extends('layouts.admin')

@section('content')
    <div class="row card shadow mb-2 p-3">
        Detail data kapal {{ $data->nama }}
    </div>
    <div class="row card shadow p-4">
        <div class="d-lg-flex d-xl-flex justify-content-center">
            <div class="col-lg-8 col-xl-8">
                <div>
                    <img src="/storage/kapal/{{ $data->gambar }}" alt="{{ $data->gambar }}" class="img-card-top img-profil">
                </div>
            </div>
            <div class="col-lg-3 col-xl-3">
                <p>Nama Kapal : {{ $data->nama }}</p>
                <p>Kapasitas Kapal : {{ $data->kapasitas }}</p>
            </div>
        </div>
        <div class="col-12 mt-5 d-flex justify-content-end">
            <a href="/admin/dashboard/kelolakapal" class="btn btn-success">kembali</a>
        </div>
    </div>
@endsection
