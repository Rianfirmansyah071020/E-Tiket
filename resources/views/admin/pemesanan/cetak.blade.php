<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan data pemesanan</title>
</head>
<style>
    .garis1 {
        font-weight: bold;
        margin-bottom: -7px;
        color: black;
    }

    .table-header {
        width: 100%;
    }

    .img1 {
        width: 90px;
    }

    .img2 {
        width: 100px;
    }

    .tableCetak {
        width: 100%;
        font-size: 10;
    }

    .tableCetak,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>

<body>
    <table class="table-header">
        <tr style="border: none;">
            <th style="width: 15%; border:none;">
                {{-- <img src="{{ public_path('/payakumbuh.jpg') }}" class="img1"> --}}
            </th>
            <th style="width:70%; border:none;">
                PT. ASDP Indonesia Ferry (Persero) Padang </br>
                <small>Jl. Perintis Kemerdekaan No.4, Sawahan Tim., Kec. Padang Tim., Kota Padang, Sumatera Barat
                    25171</small>
            </th>
            <th style="width: 15%; border:none;">
                {{-- <img src="{{ public_path('/smkn3.jpg') }}" class="img2"> --}}
            </th>
        </tr>
    </table>
    <hr class="garis1">
    <hr class="garis2">

    <table style="width: 100%; margin-bottom:30px;">
        <tr style="border: none; text-align:center;">
            <th style="border: none;">LAPORAN DATA PEMESANAN</th>
        </tr>
    </table>

    <table class="tableCetak">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pemesan</th>
                <th class="text-center">Nama Kapal</th>
                <th class="text-center">Nama Kursi</th>
                <th class="text-center">Tipe Penumpang</th>
                <th class="text-center">Tipe Kelas</th>
                <th class="text-center">Jadwal</th>
                <th class="text-center">Tanggal Berangkat</th>
                <th class="text-center">Rute Pejalanan</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah Penumpang</th>
                <th class="text-center">Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $row->pelanggan->nama }}</td>
                    <td class="text-center">{{ $row->kursi->kapal->nama }}</td>
                    <td style="text-align:center;">{{ $row->kursi->nama_kursi }}</td>
                    <td class="text-center">{{ $row->harga->tipe_penumpang }}</td>
                    <td class="text-center">{{ $row->harga->tipe_kelas }}</td>
                    <td class="text-center">{{ $row->jadwal->waktu }}</td>
                    <td style="text-align:center;">{{ $row->tanggal_berangkat }}</td>
                    <td class="text-center">{{ $row->harga->rute->awal }} -
                        {{ $row->harga->rute->tujuan }}</td>
                    <td class="text-right">{{ number_format($row->harga->harga) }}</td>
                    <td style="text-align:center;">{{ $row->jumlah }}</td>
                    <td style="text-align:right;">{{ number_format($row->total) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style="width:100%; margin-top:30px;">
        <tr style="border: none;  text-align:right;">
            <td style="border: none; padding-right:60px; font-size:10;">Padang, {{ $tanggal }}</br> </br>
                </br></br>
                </br>
                (....................................)</td>
        </tr>
    </table>
</body>

</html>
