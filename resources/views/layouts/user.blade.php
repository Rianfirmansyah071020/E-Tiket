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

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="/home">E-Tiket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if ($route === 'home') active @endif">
                    <a class="nav-link " href="/home">Home</a>
                </li>
                <li class="nav-item @if ($route === 'daftar') active @endif">
                    <a class="nav-link " href="/daftar">Daftar</a>
                </li>
                <li class="nav-item @if ($route === 'login') active @endif">
                    <a class="nav-link " href="/login">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')


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
