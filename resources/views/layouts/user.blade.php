<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" type="/image/png" sizes="16x16" href=".images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="/sass/main.css">
</head>

<body style="background-color: rgb(9, 31, 51);">
    <nav class="navbar navbar-expand-lg navbar-light position-fixed w-100 d-flex"
        style="z-index: 100; background-color: rgb(9, 31, 51);">
        <a class="navbar-brand text-white" href="/home">E-Tiket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if ($route === 'home') active @endif">
                    <a class="nav-link text-white" href="/home">Home</a>
                </li>
                <li class="nav-item @if ($route === 'daftar') active @endif">
                    <a class="nav-link text-white" href="/daftar">Daftar</a>
                </li>
                <li class="nav-item @if ($route === 'login') active @endif">
                    <a class="nav-link text-white" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="padding:38px;"></div>

    @yield('content')

    <d class="m-5"></d>

    <footer class="bg-secondary p-3">
        <div class="d-flex justify-content-center">
            <small>
                &copy; Copyright {{ date('Y') }}
            </small>
        </div>
    </footer>


    <script src="/plugins/common/common.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/gleek.js"></script>
    <script src="/js/styleSwitcher.js"></script>

    <script src="/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>
