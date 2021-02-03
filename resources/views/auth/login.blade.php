<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Siswa</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/login-siswa/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login-siswa/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login-siswa/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login-siswa/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/login-siswa/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-siswa/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/login-siswa/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/login-siswa/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-siswa/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/login-siswa/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-siswa/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/login-siswa/css/main.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="form_id" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Login Siswa
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        {{-- <input class="input100" type="text" name="email"> --}}
                        <input id="nis" type="number" class="input100" name="nis" value="{{ old('nis') }}" required
                            autocomplete="nis" autofocus>
                        @error('nis')
                        {{-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span> --}}
                        <script>
                            swal("gagal", "NIS/Passsword salah", "error")
                                .then((value) => {
                                    window.location.reload(true);
                                });


                        </script>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="label-input100">NIS</span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        {{-- <input class="input100" type="password" name="pass"> --}}
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                        {{-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span> --}}
                        <script>
                            swal("gagal", "NIS/Passsword salah", "error")
                                .then((value) => {
                                    window.location.reload(true);
                                });
                            // document.getElementById('nis').value = ''";

                        </script>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>

                <div class="login100-more"
                    style="background-image: url('{{asset('assets/login-siswa/images/bg-01.jpg')}}');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/login-siswa/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/login-siswa/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/vendor/countdowntime/countdowntime.j')}}s"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/login-siswa/js/main.js')}}"></script>

</body>

</html>


