<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - DWAdmin</title>

    <!-- Bootstrap CSS-->

    <link rel="stylesheet" href="{{asset('assets/dwadmin/vendors/bootstrap/css/bootstrap.css')}}">
    <!-- Style CSS (White)-->
    <link rel="stylesheet" href="{{asset('assets/dwadmin/css/White.css')}}">
    <!-- Style CSS (Dark)-->
    <link rel="stylesheet" href="{{asset('assets/dwadmin/css/Dark.css')}}">
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="{{asset('assets/dwadmin/vendors/fontawesome/css/all.css')}}">
    <!-- Icon LineAwesome CSS-->
    <link rel="stylesheet" href="{{asset('assets/dwadmin/vendors/lineawesome/css/line-awesome.min.css')}}">

</head>

<body>

    <!--Topbar -->
    <div class="topbar transition">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="las la-bars"></i>
            </button>
        </div>
        <div class="menu">

            <ul>
                <li>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{asset('assets/dwadmin/images/avatar/avatar-2.png')}}" alt="Profile">
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownProfile">

                            <a class="dropdown-item" href="penjaga/change_password">
                                <i class="las la-key mr-2"></i> Change password
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('penjaga.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="las la-sign-out-alt mr-2"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('penjaga.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!--Sidebar-->
    <div class="sidebarr transition overlay-scrollbars">
        <div class="logo">
            <h2 style="font-weight: 700;" class="mb-0">E-<span style="font-weight: 500;">Liblary</span></h2>
        </div>

        <div class="sidebar-items">
            <div class="accordion" id="sidebar-items">
                <ul>
                    <p class="menu">Opsi</p>

                    <li>
                        <a href="penjaga" class="items">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashoard</span>
                        </a>
                    </li>
                    <li>
                        <a href="penjaga/data_pinjaman" class="items">
                            <i class="fas fa-chart-pie"></i>
                            <span>Data peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="penjaga/daftar_hadir" class="items">
                            <i class="far fa-chart-bar"></i>
                            <span>Data peminjaman</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay"></div>


    <!--Content Start-->
    <div class="content transition" style="padding-bottom: -100px;">
        <div class="container-fluid dashboard">
            <h3>Dashboard</h3>

            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="las la-chart-bar  icon-home bg-info text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Kehadiran</p>
                                    <h5>{{$daftar_hadir}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="las la-book icon-home bg-success text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Buku</p>
                                    <h5>{{$buku}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="las la-user  icon-home bg-info text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Siswa</p>
                                    <h5>{{$siswa}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="las la-chart-pie  icon-home bg-warning text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Pinjaman</p>
                                    <h5>{{$peminjaman}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->
    <div class="footer transition" style="margin-top: -7%;"">
		{{-- <hr> --}}
		<p>
			&copy; 2020 All Right Reserved by <a href=" #" target="_blank">DWAdmin</a>
        </p>
    </div>

    <!-- Loader -->
    <div class="loader">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="loader-overlay"></div>

    <!-- Library Javascipt-->
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/js/script.js')}}"></script>
</body>

</html>


{{-- @extends('penjaga.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penjaga :: Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
</div>
@endif

You are logged in!
</div>
</div>
</div>
</div>
</div>
@endsection --}}
