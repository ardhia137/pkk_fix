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
                            <a href="data_buku" class="nav-link">
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
                            <a href="data_pengurus" class="nav-link active">
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
                            <h1>Data pengurus</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">Data pengurus</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
                        <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">tambah pengurus</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form_tambah_data">
                                        {{-- <input type="hidden" id="id_buku" name="id_buku" value=""> --}}
                                        <label>Nama:</label>
                                        <input type="text" name="name" id="t_nama" value=""
                                            class="form-control" placeholder="Nama">
                                        <label>Email:</label>
                                        <input type="text" name="name" id="t_email" value=""
                                            class="form-control" placeholder="email">

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
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
                            data-target="#tambah_data" style=" margin-bottom: 10px;">
                            Tambah pengurus
                        </button>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>nama</th>
                                            <th>email</th>
                                            <th>opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengurus as $b)
                                        <tr>
                                            <td data-toggle="modal" data-target="#edit" id="editPengurus"
                                                data-id="{{ $b->id }}">{{$b->id}}</td>
                                            <td data-toggle="modal" data-target="#edit" id="editPengurus"
                                                data-id="{{ $b->id }}">{{$b->name}}
                                            </td>
                                            <td data-toggle="modal" data-target="#edit" id="editPengurus"
                                                data-id="{{ $b->id }}"> {{$b->email}}</td>
                                            <td><a href="{{ route('admin.hapus_pengurus',$b->id) }}"
                                                    class="btn btn-danger " style="font-size: 0.8em;"
                                                    id="hapus" data-id="{{ $b->id }}">
                                                    Hapus
                                                </a>
                                                <a href="{{ route('admin.cps_pengurus',$b->id) }}"
                                                    class="btn btn-primary " style="font-size: 0.8em;"
                                                    id="cps" data-id="{{ $b->id }}">
                                                    Reset Password
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit pengurus</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="companydata">
                                                    <input type="hidden" name="name" id="id" value=""
                                                        class="form-control" placeholder="" readonly>
                                                    <label>Nama:</label>
                                                    <input type="text" name="name" id="name" value=""
                                                        class="form-control" placeholder="Nama">
                                                    <label>email</label>
                                                    <input type="text" name="name" id="email" value=""
                                                        class="form-control" placeholder="Nama">

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
                var name = $("#t_nama").val();
                var email = $("#t_email").val();
                console.log(name);
                $.ajax({
                    url: 'data_pengurus/tambah_pengurus' ,
                    type: "POST",
                    data: {

                        name: name,
                        email: email,
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
            });
            // update
            $('body').on('click', '#submit', function (event) {
                event.preventDefault()
                var id = $("#id").val();
                var name = $("#name").val();
                var email = $("#email").val();
                console.log(name);
                $.ajax({
                    url: 'data_pengurus/update/' + id,
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                    },
                    // console.log(data);
                    dataType: 'json',
                    // error: function(data){
                    //     console.log(data);
                    // }
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
            });
            // edit
            $('body').on('click', '#editPengurus', function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                console.log(id)
                $.get('data_pengurus/edit/' + id, function (data) {
                    $('#userCrudModal').html("Edit pengurus");
                    $('#submit').val("Edit pengurus");
                    $('#edit').modal('show');
                    $('#id').val(data.data.id);
                    $('#name').val(data.data.name);
                    $('#email').val(data.data.email);
                })
            });
            // hapus
            $('body').on('click', '#hapus', function (event) {
                event.preventDefault()
                var id= $(this).data('id');
                console.log(id);
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
                                url: 'data_pengurus/hapus_pengurus/' + id,
                                type: "delete",
                                data: {
                                    id: id,
                                },
                                // console.log(data);
                                dataType: 'json',
                                success: function (data) {
                                    swal("Suksess", "Anda berhasil menghapus data", "success")
                            .then((value) => {
                                window.location.reload(true);
                            });
                                }
                            });
                        }
                    });
            });
            $('body').on('click', '#cps', function (event) {
                event.preventDefault()
                var id= $(this).data('id');
                console.log(id);
                swal({
                        title: "WARNING!!",
                        text: "Anda Yakin Ingin Mereset Password ?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: 'data_pengurus/cps_pengurus/' + id,
                                type: "put",
                                data: {
                                    id: id,
                                },
                                // console.log(data);
                                dataType: 'json',
                                success: function (data) {
                                    swal("Suksess", "Anda berhasil mereset password", "success")
                            .then((value) => {
                                window.location.reload(true);
                                console.log(data);
                            });
                                }
                            });
                        }
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
