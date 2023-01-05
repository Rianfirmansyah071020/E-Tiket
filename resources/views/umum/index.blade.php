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
                <img src="/content/bac1.jpeg" class="d-block w-100" alt="..." style="height: 33rem">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/content/bac2.jpeg" class="d-block w-100" alt="..." style="height: 33rem">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="/content/bac3.jpeg" class="d-block w-100" alt="..." style="height: 33rem">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="/content/bac5.jpeg" class="d-block w-100" alt="..." style="height: 33rem">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="/content/bac6.jpeg" class="d-block w-100" alt="..." style="height: 33rem">
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

    <div class="container-lg container-xl container-md mb-5">
        <div class="row mt-4 card bg-light p-5" style="border-bottom: 4px solid rgb(124, 107, 8);">
            <div class="d-flex justify-content-center mb-5">
                <div style="width:max-content; border-bottom:4px solid rgb(109, 93, 5);">
                    <h2 class="text-center">PT ASDP Indonesia Ferry ( Persero)</h2>
                </div>
            </div>
            <div class="pt-1 pl-5 pr-5">
                PT ASDP Indonesia Ferry ( Persero) atau ASDP adalah BUMN yang bergerak dalam bisnis jasa penyeberangan dan
                pelabuhan terintegrasi dan tujuan wisata waterfront. ASDP menjalankan armada ferry sebanyak lebih dari 200
                unit yang menangani 299 rute di 34 pelabuhan di seluruh Indonesia dan mengembangkan bisnis lainnya terkait
                dengan pengembangan kawsasan pelabuhan, seperti Bakauheni Harbour City di Provinsi Lampung dan Kawasan
                Marina Labuan Bajo di Nusa Tenggara Timur.
            </div>
        </div>
        <div class="row mt-2 card bg-light p-5" style="border-bottom: 4px solid rgb(124, 107, 8);">
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

        <div class="mt-2 card p-3">
            <div class="d-flex justify-content-center mb-5">
                <div style="width:max-content; border-bottom:4px solid rgb(109, 93, 5);">
                    <h2 class="text-center">Lokasi</h2>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7978.549385446724!2d100.366805!3d-0.945838!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2c8873c9a96ebd41!2sPT.%20ASDP%20Indonesia%20Ferry%20(Persero)%20Padang!5e0!3m2!1sid!2sus!4v1671849577888!5m2!1sid!2sus"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
