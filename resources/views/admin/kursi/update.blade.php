@extends('layouts.admin')

@section('content')
    <div class="row d-lg-flex d-xl-flex justify-content-center align-content-center">
        <div class="col-lg-6 col-xl-6 col-md-12 p-4 m-1">
            <div class="card shadow p-4">
                <form action="/admin/dashboard/kelolakursi/update/{{ $data->id }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        Update Data Kursi
                    </div>
                    <hr>
                    <div>
                        <label for="kapal_id">Nama Kapal</label>
                        <select name="kapal_id" id="kapal_id" class="form-control">
                            <option value="">Pilih kapal</option>
                            @foreach ($kapal as $row)
                                <option value="{{ $row->id }}" @selected($row->id === $data->kapal_id)>{{ $row->nama }}
                                </option>
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
                            value="{{ $data->nama_kursi }}">
                        @error('nama_kursi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <a href="/admin/dashboard/kelolakursi" class="btn btn-info mr-2">kembali</a>
                        <button type="submit" class="btn btn-success ">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
