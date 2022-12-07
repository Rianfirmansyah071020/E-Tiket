<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="/image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="/sass/main.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background-color: white;">
            <div class="brand-logo">
                <a href="/admin/dashboard">
                    <span class="brand-title">
                        <h2 class="text-brand">E-Tiket</h2>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <small>{{ $userLogin->nama }}</small>
                                <span class="activity active"></span>
                                <img src="/storage/admin/{{ $userLogin->gambar }}" height="40" width="40"
                                    alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="/admin/dashboard/profil/{{ $userLogin->id }}"><i
                                                    class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/admin/dashboard" aria-expanded="false">
                            <i class="fa-solid fa-gauge "></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolaadmin" aria-expanded="false">
                            <i class="fa-solid fa-users-gear"></i><span class="nav-text">Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolapelanggan" aria-expanded="false">
                            <i class="fa-solid fa-users-gear"></i><span class="nav-text">Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolarute" aria-expanded="false">
                            <i class="fa-solid fa-route"></i><span class="nav-text">Rute</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolajadwal" aria-expanded="false">
                            <i class="fa-solid fa-calendar-days"></i><span class="nav-text">Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolakapal" aria-expanded="false">
                            <i class="fa-solid fa-ship"></i><span class="nav-text">Kapal</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolakursi" aria-expanded="false">
                            <i class="fa-solid fa-chair"></i><span class="nav-text">Kursi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolaharga" aria-expanded="false">
                            <i class="fa-solid fa-money-bill"></i><span class="nav-text">Harga</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolapemesanan" aria-expanded="false">
                            <i class="fa-solid fa-money-bill"></i><span class="nav-text">Pemesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/kelolapembayaran" aria-expanded="false">
                            <i class="fa-solid fa-money-bill"></i><span class="nav-text">Pembayaran</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ $route }}</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; {{ date('Y') }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
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
