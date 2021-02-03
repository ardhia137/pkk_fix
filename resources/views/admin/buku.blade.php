<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/changepassword" class="nav-link">Change Password</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                     document.getElementById('admin-logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                    {{-- <a href="#" class="nav-link">Contact</a> --}}
                </li>
            </ul>

            <!-- SEARCH FORM -->
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <table>
                    <tr >
                        <td rowspan="2"><img id="icon-url" width="65px"
                                class="" style="size: 100px">
                        </td>
                        <td>
                            <p class="brand-text font-weight-light" style="margin: auto" id='clock'></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="temp-main" class="brand-text font-weight-light">......</p>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="data_buku" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Buku
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="data_siswa" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Data Siswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="data_admin" class="nav-link">
                                <i class="nav-icon fas fa-user-lock"></i>
                                <p>
                                    Data Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="data_pengurus" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Data Pengurus
                                </p>
                            </a>
                        </li>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">Data Buku</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">tambah buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_tambah_data">

                                {{-- <input type="hidden" id="id_buku" name="id_buku" value=""> --}}
                                <label>Nama Buku:</label>
                                <input type="text" name="name" id="t_nama_buku" value="" class="form-control" required>
                                <label>Jumlah Buku:</label>
                                <input type="number" name="name" id="t_jumlah" value="" class="form-control" required>
                                <label>Tahun Terbit:</label>
                                <input type="number" name="name" id="t_tahun_terbit" value="" class="form-control"
                                    required>
                                <label>kategori:</label>
                                <input type="text" name="name" id="t_jenis_buku" value="" class="form-control" required>
                                <label>Status:</label>
                                <select class="form-control" id="t_myselect">
                                    <option value="tersedia">tersedia</option>
                                    <option value="tidak tersedia">tidak tersedia</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="submit_tambah" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->

                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#tambah_data" style="width: 120px; margin-bottom: 10px;">
                                    Tambah Buku
                                </button>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id buku</th>
                                            <th>nama buku</th>
                                            <th>tahun terbit</th>
                                            <th>kategori</th>
                                            <th>status</th>
                                            <th>opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buku as $b)
                                        <tr>
                                            <td data-toggle="modal" data-target="#edit" id="editBuku"
                                                data-id="{{ $b->id_buku }}">{{$b->id_buku}}</td>
                                            <td data-toggle="modal" data-target="#edit" id="editBuku"
                                                data-id="{{ $b->id_buku }}">{{$b->nama_buku}}
                                            </td>
                                            <td data-toggle="modal" data-target="#edit" id="editBuku"
                                                data-id="{{ $b->id_buku }}">{{$b->tahun_terbit}}</td>
                                            <td data-toggle="modal" data-target="#edit" id="editBuku"
                                                data-id="{{ $b->id_buku }}"> {{$b->jenis_buku}}</td>
                                            <td data-toggle="modal" data-target="#edit" id="editBuku"
                                                data-id="{{ $b->id_buku }}">{{$b->status}}</td>
                                            <td><a href="{{ route('admin.hapus_buku',$b->id_buku) }}"
                                                    class="btn btn-danger " style="font-size: 0.8em;" id="hapus"
                                                    data-id="{{ $b->id_buku }}">
                                                    Hapus
                                                </a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit buku</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="companydata">

                                                    <input type="hidden" id="id_buku" name="id_buku" value="">
                                                    <label>Nama Buku:</label>
                                                    <input type="text" name="name" id="nama_buku" value=""
                                                        class="form-control">
                                                    <label>Tahun Terbit:</label>
                                                    <input type="text" name="name" id="tahun_terbit" value=""
                                                        class="form-control">
                                                    <label>kategori:</label>
                                                    <input type="text" name="name" id="jenis_buku" value=""
                                                        class="form-control">
                                                    <label>Status:</label>
                                                    <select class="form-control" id="myselect">
                                                        <option value="tersedia">tersedia</option>
                                                        <option value="tidak tersedia">tidak tersedia</option>
                                                    </select>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" id="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.4
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
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
                var jumlah = $("#t_jumlah").val();
                var nama_buku = $("#t_nama_buku").val();
                var tahun_terbit = $("#t_tahun_terbit").val();
                var jenis_buku = $("#t_jenis_buku").val();
                var status = $("#t_myselect").val();
                if (jumlah == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else if (nama_buku == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else if (tahun_terbit == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else if (jenis_buku == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else{
                   console.log(status);
                    $.ajax({
                        url: 'data_buku/tambah_buku',
                        type: "POST",
                        data: {
                            jumlah: jumlah,
                            nama_buku: nama_buku,
                            tahun_terbit: tahun_terbit,
                            jenis_buku: jenis_buku,
                            status: status,
                        },
                        // console.log(data);
                        dataType: 'json',
                        success: function (data) {
                            console.log(data)
                            $('#form_tambah_data').trigger("reset");
                            $('#tambah_data').modal('hide');
                            swal("Suksess", "Anda berhasil menambahkan data", "success")
                                .then((value) => {
                                    window.location.reload(true);

                                });
                        }
                    });
                }

            });
            // update
            $('body').on('click', '#submit', function (event) {
                event.preventDefault()
                var id_buku = $("#id_buku").val();
                var nama_buku = $("#nama_buku").val();
                var tahun_terbit = $("#tahun_terbit").val();
                var jenis_buku = $("#jenis_buku").val();
                var status = $("#myselect").val();
                console.log(nama_buku);
                if (nama_buku == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else if (tahun_terbit == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else if (jenis_buku == "") {
                    swal("Error", "Silakan masukan data dengan benar", "error");
                }
                else{
                    console.log(jenis_buku);
                    $.ajax({
                        url: 'data_buku/update/' + id_buku,
                        type: "POST",
                        data: {
                            id_buku: id_buku,
                            nama_buku: nama_buku,
                            tahun_terbit: tahun_terbit,
                            jenis_buku: jenis_buku,
                            status: status,
                        },
                        // console.log(data);
                        dataType: 'json',
                        success: function (data) {
                            console.log(data)
                            $('#companydata').trigger("reset");
                            $('#edit').modal('hide');
                            swal("Suksess", "Anda berhasil menedit data", "success")
                                .then((value) => {
                                    window.location.reload(true);

                                });
                        }
                    });
                }
            });

            // edit
            $('body').on('click', '#editBuku', function (event) {
                event.preventDefault();
                var id_buku = $(this).data('id');
                console.log(id_buku)
                $.get('data_buku/edit/' + id_buku, function (data) {
                    $('#userCrudModal').html("Edit buku");
                    $('#submit').val("Edit buku");
                    $('#edit').modal('show');
                    $('#id_buku').val(data.data.id_buku);
                    $('#nama_buku').val(data.data.nama_buku);
                    $('#tahun_terbit').val(data.data.tahun_terbit);
                    $('#jenis_buku').val(data.data.jenis_buku);
                    $('#status').val(data.data.status);
                    var status = data.data.status;
                    if (status == 'tersedia') {
                        $("#myselect").val('tersedia');
                        console.log(status);
                    } else if (status == 'tidak tersedia') {
                        $("#myselect").val('tidak tersedia');
                        console.log(status);
                    } else {
                        alert('error');
                    }
                })
            });

            // hapus
            $('body').on('click', '#hapus', function (event) {
                event.preventDefault()
                var id_buku = $(this).data('id');

                console.log(id_buku);
                swal({
                        title: "WARNING!!",
                        text: "Anda Yakin Ingin Menghapus Data ?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: 'data_buku/hapus_buku/' + id_buku,
                                type: "delete",
                                data: {
                                    id_buku: id_buku,
                                },
                                // console.log(data);
                                dataType: 'json',
                                success: function (data) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    });
                                    window.location.reload(true);
                                    console.log(data)
                                }
                            });
                        } else {}
                    });

            });

        });

    </script>
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
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
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/clock.js')}}"></script>
    <script src="{{ asset('assets/js/weather.js')}}"></script>
</body>

</html>

{{-- @extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin :: Dashboard</div>

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
