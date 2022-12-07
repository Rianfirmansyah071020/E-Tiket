@extends('layouts.admin')

@section('content')
    <div class="row card shadow p-3">
        <h4>Kelola Data Admin</h4>
    </div>
    <form action="/admin/dashboard/kelolaadmin/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row card shadow p-4">
            <h5>Tambah data admin</h5>
            <hr>
            <div class="d-lg-flex d-xl-flex justify-content-center">
                <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 m-1">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="masukan email anda.."
                            class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
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
                            class="form-control @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
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
                            class="form-control @error('nohp') is-invalid @enderror" required value="{{ old('nohp') }}">
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
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Admin</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tanggal Tahun Lahir</th>
                                    <th class="text-center">Nomor Hp</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td class="text-center">{{ $row->jekel }}</td>
                                        <td class="text-center">{{ $row->tgl_lahir }}</td>
                                        <td class="text-end">{{ $row->nohp }}</td>
                                        <td class="d-flex justify-content-end">
                                            <a href="/admin/dashboard/kelolaadmin/detail/{{ $row->id }}"
                                                class="btn btn-info m-1">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="/admin/dashboard/kelolaadmin/update/{{ $row->id }}"
                                                class="btn btn-success m-1">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="/admin/dashboard/kelolaadmin/delete/{{ $row->email }}"
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tanggal Tahun Lahir</th>
                                    <th class="text-center">Nomor Hp</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
