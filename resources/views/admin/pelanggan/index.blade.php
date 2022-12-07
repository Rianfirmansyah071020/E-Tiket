@extends('layouts.admin')

@section('content')
    <div class="row p-3">
        <a href="/admin/dashboard/kelolapelanggan/cetak" class="btn btn-info" target="_blank">Cetak</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Data Pelanggan</h4>
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
                                            <a href="/admin/dashboard/kelolapelanggan/detail/{{ $row->id }}"
                                                class="btn btn-info m-1">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="/admin/dashboard/kelolapelanggan/update/{{ $row->id }}"
                                                class="btn btn-success m-1">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="/admin/dashboard/kelolapelanggan/delete/{{ $row->email }}"
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
