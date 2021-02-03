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


            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <table>
                    <tr>
                        <td rowspan="2"><img id="icon-url" width="65px" class="" style="size: 100px">
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
                        <li class="nav-item has-treeview menu-open">
                            <a href="/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/data_buku" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Buku
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/data_siswa" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Data Siswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/data_admin" class="nav-link">
                                <i class="nav-icon fas fa-user-lock"></i>
                                <p>
                                    Data Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/data_pengurus" class="nav-link">
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Change Password</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Change Password</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" input  id="quickForm">
                                    <input type="hidden" id="id" value="{{ Auth::guard('admin')->user()->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="password_lama">Passwrd Lama</label>
                                            <input type="password" name="password_lama" class="form-control"
                                                id="password_lama" placeholder="Masukan Password Lama">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password_baru">Passwrod Baru</label>
                                            <input type="password" name="password" class="form-control"
                                                id="password_baru" placeholder="Masukan Password Baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_password_baru">Ulang Password Baru</label>
                                            <input type="password" name="password" class="form-control"
                                                id="retype_password_baru" placeholder="Masukan Ulang Password Baru">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

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
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/clock.js')}}"></script>
    <script src="{{ asset('assets/js/weather.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '#submit', function (event) {
                event.preventDefault()
                var id = $("#id").val();
                var password_lama = $("#password_lama").val();
                var password_baru = $("#password_baru").val();
                var retype_password_baru = $("#retype_password_baru").val();
                console.log(retype_password_baru);
                console.log(password_baru);
                if (password_lama == "") {
                    swal("Error", "Field Tidak Boleh Kosong", "error");
                }
                else if (password_baru =="") {
                    swal("Error", "Field Tidak Boleh Kosong", "error");
                }
                else if(retype_password_baru ==""){
                    swal("Error", "Field Tidak Boleh Kosong", "error");
                }
                else{
                    if (password_baru == retype_password_baru) {
                        $.ajax({
                            url: 'changepassword/action' ,
                            type: "POST",
                            data: {
                                id: id,
                                password_lama: password_lama,
                                password_baru:password_baru,
                            },
                            // console.log(data);
                            dataType: 'json',
                            // error: function(data){
                                // console.log(data);
                            // }
                            success: function (data) {
                                console.log(data)
                                if (data['message'] == 'suksess') {
                                    $('#quickForm').trigger("reset");
                                    // $('#tambah_data').modal('hide');
                                    swal("Suksess", "Anda berhasil menambahkan data", "success")
                                        .then((value) => {
                                            window.location.reload(true);
                                        });
                                }
                                else if (data['message'] == 'gagal') {
                                    $('#quickForm').trigger("reset");
                                    // $('#tambah_data').modal('hide');
                                    swal("error", "Password lama salah", "error")
                                        .then((value) => {
                                            window.location.reload(true);
                                        });
                                }
                            }
                        });
                    }
                    else{
                        swal("Error", "password baru dan retype password tidak sama", "error");
                    }
                }
            });
        });

    </script>
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
