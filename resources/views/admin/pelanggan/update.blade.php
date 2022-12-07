@extends('layouts.admin')

@section('content')
    <form action="/admin/dashboard/kelolapelanggan/update_aksi/{{ $data->id }}/{{ $data->email }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row card shadow p-4">
            <h5>Update data pelanggan <span class="text-info">{{ $data->nama }}</span></h5>
            <hr>
            <div class="d-lg-flex d-xl-flex justify-content-center">
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1  d-lg-flex justify-content-center">
                    <div class="card">
                        <img src="/storage/pelanggan/{{ $data->gambar }}" alt="{{ $data->gambar }}"
                            class="img-card-top img-profil">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" readonly placeholder="masukan email anda.."
                            class="form-control @error('email') is-invalid @enderror" required value="{{ $data->email }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" placeholder="masukan password anda.."
                            class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="masukan nama anda.."
                            class="form-control @error('nama') is-invalid @enderror" required value="{{ $data->nama }}"">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="jekel">Jenis Kelamin</label>
                        <select name="jekel" id="jekel" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" @selected($data->jekel === 'laki-laki')>Laki-Laki</option>
                            <option value="perempuan" @selected($data->jekel === 'perempuan')>Perempuan</option>
                        </select>
                        @error('jekel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                    <div class="mt-2">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="2"
                            class="form-control @error('alamat') is-invalid @enderror" placeholder="masukan alamat">{{ $data->alamat }}</textarea>
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="tgl_lahir">Tanggal / Tahun Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir"
                            class="form-control @error('tgl_lahir') is-invalid @enderror" required
                            value="{{ $data->tgl_lahir }}">
                        @error('tgl_lahir')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="nohp">Nomor Hp</label>
                        <input type="text" name="nohp" id="nohp" placeholder="masukan nomor hp anda.."
                            class="form-control @error('nohp') is-invalid @enderror" required value="{{ $data->nohp }}">
                        @error('nohp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="gambar">Gambar Baru</label>
                        <input type="hidden" name="gambarLama" value="{{ $data->gambar }}">
                        <input type="file" name="gambar" id="gambar"
                            class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}">
                        @error('gambar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <small class="text-danger">Format yang diizinkan PNG,JPEG,JPG</small>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <a href="/admin/dashboard/kelolaadmin" class="btn btn-success mr-1">kembali</a>
                        <button type="submit" class="btn btn-info">simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
