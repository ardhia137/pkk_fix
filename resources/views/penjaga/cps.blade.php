<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <a href="/penjaga/data_pinjaman" class="items">
                            <i class="fas fa-chart-pie"></i>
                            <span>Data peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="/penjaga/daftar_hadir" class="items">
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
    <div class="content transition">
		<div class="container-fluid dashboard">
			<h3>Change Password</h3>

			<!-- Start Validation -->
			<div class="row">

				<!--Start Alerts-->
				<div class="col-12">
					<div class="card">
						<div class="card-header  font-weight-bold mr-auto">
							<h4>Form Change Password</h4>
						</div>
						<div class="card-body">
                            <form role="form" input  id="quickForm">
                                <input type="hidden" id="id" value="{{ Auth::guard('penjaga')->user()->id }}">
								<div class="form-group">
									<label>Password Lama</label>
									<input type="password" id="password_lama" class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Password Baru</label>
									<input type="password" id="password_baru" class="form-control" required="">
								</div>
								<div class="form-group">
                                    <label>Ulang Password Baru</label>
									<input type="password" id="retype_password_baru" class="form-control" required="">
								</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" id="submit">Submit</button>
						</div>
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>
	</div>
    </div>
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

    <div class="loader-overlay"></div>

    <!-- Library Javascipt-->
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/vendors/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dwadmin/js/script.js')}}"></script>
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
                            url: 'change_password/action' ,
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
