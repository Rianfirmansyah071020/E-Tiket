@extends('layouts.user')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
@section('content')
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="/content/design.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/content/design.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="/content/design.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row mt-4">
            <h2 class="text-center">PT ASDP Indonesia Ferry ( Persero)</h2>
            <div class="pt-1 pl-5 pr-5">
                PT ASDP Indonesia Ferry ( Persero) atau ASDP adalah BUMN yang bergerak dalam bisnis jasa penyeberangan dan
                pelabuhan terintegrasi dan tujuan wisata waterfront. ASDP menjalankan armada ferry sebanyak lebih dari 200
                unit yang menangani 299 rute di 34 pelabuhan di seluruh Indonesia dan mengembangkan bisnis lainnya terkait
                dengan pengembangan kawsasan pelabuhan, seperti Bakauheni Harbour City di Provinsi Lampung dan Kawasan
                Marina Labuan Bajo di Nusa Tenggara Timur.
            </div>
        </div>
        <div class="row mt-5">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Alamat</th>
                    <td>Jl. Perintis Kemerdekaan No.4, Sawahan Timur, Padang Timur, West Sumatra,
                    </td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>+62 751 27153</td>
                </tr>
                <tr>
                    <th>Jam</th>
                    @foreach ($jadwal as $row)
                <tr>
                    <th></th>
                    <td>{{ $row->waktu }}</td>
                </tr>
                @endforeach
                </tr>
                <tr>
                    <th>Website</th>
                    <td><a href="https://www.indonesiaferry.co.id/" target="_blank"
                            class="text-link">www.indonesiaferry.co.id</a></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
