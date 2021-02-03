<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Ionicons -->



    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

</head>

<body>

    <!--Topbar -->
    <div class="topbar transition">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="las la-bars"></i>
            </button>
            <div style="padding-top: 10px">

            </div>
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

                            <a class="dropdown-item" href="/penjaga/change_password">
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
                            {{-- <a class="dropdown-item" href="signin.html">
                                <i class="las la-sign-out-alt mr-2"></i> Sign Out
                            </a> --}}
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
                        <a href="/penjaga" class="items">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashoard</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_pinjaman" class="items">
                            <i class="fas fa-chart-pie"></i>
                            <span>Data peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="daftar_hadir" class="items">
                            <i class="far fa-chart-bar"></i>
                            <span>Data peminjaman</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay"></div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_tambah_data">
                        {{-- <input type="hidden" id="id_buku" name="id_buku" value=""> --}}
                        <label>Nis:</label>
                        <input type="text" name="number" id="t_nis" value="" class="form-control" placeholder="Nis">
                        <label>Id Buku:</label>
                        <input type="text" name="number" id="t_id_buku" value="" class="form-control"
                            placeholder="Id Buku">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="reset" data-dismiss="modal">Close</button>
                    <button type="button" id="submit_tambah" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalpengembalian" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pengembalian</h5>
                    <button type="button" class="close" data-dismiss="modal" id="close_p" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_pengembalian">
                        {{-- <input type="hidden" id="id_buku" name="id_buku" value=""> --}}
                        <label>Nis:</label>
                        <input type="text" name="number" id="p_nis" value="" class="form-control" placeholder="Nis">
                        <label>Id Buku:</label>
                        <input type="text" name="number" id="p_id_buku" value="" class="form-control"
                            placeholder="Id Buku">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="reset_p" data-dismiss="modal">Close</button>
                    <button type="button" id="submit_pengembalian" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--Content Start-->
    <div class="content transition" style="padding-bottom: -100px;">
        <div class="container-fluid dashboard">
            <h3>Data Pinjaman</h3>
            <div style="padding-bottom: 20px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    + Peminjaman
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalpengembalian">- Pengembalian</button>
                <a href="data_pinjaman/export_excel" class="btn btn-success my-3" target="_blank">Export Laporan</a>
            </div>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="color: black;">no</th>
                        <th style="color: black;">nis</th>
                        <th style="color: black;">nama peminjam</th>
                        <th style="color: black;">id buku</th>
                        <th style="color: black;">nama buku</th>
                        <th style="color: black;">tanggal peminjaman</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $no => $q)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$q->nis}}</td>
                        <td>{{$q->nama}}</td>
                        <td>{{$q->id_buku}}</td>
                        <td>{{$q->nama_buku}}</td>
                        <td>{{$q->tanggal_peminjaman}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>

    <!-- Footer -->
    <div class="footer transition">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '#submit_tambah', function (event) {
                event.preventDefault()
                var nis = $("#t_nis").val();
                var id_buku = $("#t_id_buku").val();
                console.log(nis);
                console.log(id_buku);
                $.ajax({
                    url: 'data_pinjaman/tambah_pinjaman',
                    type: "POST",
                    data: {
                        nis: nis,
                        id_buku: id_buku,
                    },
                    dataType: 'json',

                    // error: function(data){
                    //     console.log(data);
                    // }
                    success: function (data) {
                        console.log(data)
                        if (data['success'] != false) {
                            $('#form_tambah_data').trigger("reset");
                            $('#tambah_data').modal('hide');
                            swal("Suksess", "Anda berhasil menambahkan data", "success")
                                .then((value) => {
                                    window.location.reload(true);
                                });
                        } else {
                            $('#form_tambah_data').trigger("reset");
                            $('#tambah_data').modal('hide');
                            swal("gagal", data['messege'], "error")
                                .then((value) => {
                                    window.location.reload(true);
                                });
                        }
                    }
                });
            });
            $('#close').click(function () {
                $('#form_tambah_data')[0].reset();
            });
            $('#reset').click(function () {
                $('#form_tambah_data')[0].reset();
            });


            $('body').on('click', '#submit_pengembalian', function (event) {
                event.preventDefault()
                var nis = $("#p_nis").val();
                var id_buku = $("#p_id_buku").val();
                console.log(nis);
                console.log(id_buku);
                $.ajax({
                    url: 'data_pinjaman/pengembalian',
                    type: "POST",
                    data: {
                        nis: nis,
                        id_buku: id_buku,
                    },
                    dataType: 'json',

                    // error: function(data){
                    //     console.log(data);
                    // }
                    success: function (data) {
                        console.log(data)
                        if (data['success'] != false) {
                            $('#form_tambah_data').trigger("reset");
                            $('#tambah_data').modal('hide');
                            swal("Suksess", "Anda berhasil mengembalikan buku", "success")
                                .then((value) => {
                                    window.location.reload(true);
                                });
                        } else {
                            $('#form_tambah_data').trigger("reset");
                            $('#tambah_data').modal('hide');
                            swal("gagal", data['messege'], "error")
                                .then((value) => {
                                    window.location.reload(true);
                                });
                        }
                    }
                });
            });
            $('#close_p').click(function () {
                $('#form_pengembalian')[0].reset();
            });
            $('#reset_p').click(function () {
                $('#form_pengembalian')[0].reset();
            });
        });

    </script>

    <div class="loader-overlay"></div>

    <!-- Library Javascipt-->
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/js/script.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>
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
