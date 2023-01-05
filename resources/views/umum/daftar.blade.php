@extends('layouts.user')

@section('content')
    <div class="container card shadow">
        <div class="p-4 mt-2">
            <div class="d-flex justify-content-center">
                <div style="border-bottom: 3px solid rgb(105, 91, 11); width:max-content;">
                    <h4>Bagi yang ingin memesanan tiket silahkan daftar terlebih dahulu, setelah daftar lakukan login</h4>
                </div>
            </div>
        </div>
        <form action="/pelanggan/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row card  p-4">
                <h5>Form pendaftaran</h5>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <hr>
                <div class="d-lg-flex d-xl-flex justify-content-center">
                    <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="masukan email anda.."
                                class="form-control @error('email') is-invalid @enderror" required
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="masukan password anda.."
                                class="form-control @error('password') is-invalid @enderror" required
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="masukan nama anda.."
                                class="form-control @error('nama') is-invalid @enderror" required
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                        <div>
                            <label for="jekel">Jenis Kelamin</label>
                            <select name="jekel" id="jekel" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" @selected(old('jekel') === 'laki-laki')>Laki-Laki</option>
                                <option value="perempuan" @selected(old('jekel') === 'perempuan')>Perempuan</option>
                            </select>
                            @error('jekel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="2"
                                class="form-control @error('alamat') is-invalid @enderror" placeholder="masukan alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="tgl_lahir">Tanggal / Tahun Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir"
                                class="form-control @error('tgl_lahir') is-invalid @enderror" required
                                value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                        <div>
                            <label for="nohp">Nomor Hp</label>
                            <input type="text" name="nohp" id="nohp" placeholder="masukan nomor hp anda.."
                                class="form-control @error('nohp') is-invalid @enderror" required
                                value="{{ old('nohp') }}">
                            @error('nohp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar"
                                class="form-control @error('gambar') is-invalid @enderror" required
                                value="{{ old('gambar') }}">
                            @error('gambar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <small class="text-danger">Format yang diizinkan PNG,JPEG,JPG</small>
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="reset" class="btn btn-success mr-2">reset</button>
                            <button type="submit" class="btn btn-info">simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
