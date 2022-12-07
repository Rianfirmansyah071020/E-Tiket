@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-center p-4">
        <div class="col-lg-6 col-xl-6 col-md-12 p-4 m-1">
            <form action="/admin/dashboard/kelolakapal/update/{{ $data->id }}" method="post"
                enctype="multipart/form-data">
                <div class="card shadow p-4">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        Update Data Kapal {{ $data->nama }}
                    </div>
                    <hr>
                    <div>
                        <label for="nama">Nama Kapal</label>
                        <input type="text" name="nama" id="nama" placeholder="masukan nama anda.."
                            class="form-control @error('nama') is-invalid @enderror" required value="{{ $data->nama }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" name="kapasitas" id="kapasitas" placeholder="masukan kapasitas anda.."
                            class="form-control @error('kapasitas') is-invalid @enderror" required
                            value="{{ $data->kapasitas }}">
                        @error('kapasitas')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}">
                        @error('gambar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <img src="/storage/kapal/{{ $data->gambar }}" alt="{{ $data->gambar }}" class="img-update-kapal">
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <a href="/admin/dashboard/kelolakapal" class="btn btn-info mr-2">kembali</a>
                        <button type="submit" class="btn btn-success ">simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
