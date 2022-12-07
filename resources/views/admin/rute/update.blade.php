@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-lg-6 col-xl-6 col-md-12p-4 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolarute/update/{{ $data->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        Update Data Rute
                    </div>
                    <hr>
                    <div>
                        <label for="awal">Pelabuhan Awal</label>
                        <input type="text" name="awal" id="awal" placeholder="masukan awal anda.."
                            class="form-control @error('awal') is-invalid @enderror" required value="{{ $data->awal }}">
                        @error('awal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tujuan">Pelabuhan Tujuan</label>
                        <input type="text" name="tujuan" id="tujuan" placeholder="masukan tujuan anda.."
                            class="form-control @error('tujuan') is-invalid @enderror" required value="{{ $data->tujuan }}">
                        @error('tujuan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <a href="/admin/dashboard/kelolarute" class="btn btn-info m-1">kembali</a>
                        <button type="submit" class="btn btn-success ">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
