<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @include('sweet::alert')
    <div class="header"
        style="background-image: url({{asset('assets/image/bg.jpg')}}); background-repeat: no-repeat; background-size: 100% 100%; height: 320px;">
        <h1>
            <p href="" class="typewrite" data-period="2000" data-type='[ "Selamat Datang Di E-library."]'>
                <span class="wrap"></span>
            </p>
        </h1>
        <script src="{{asset('assets/js/write_text.js')}}"></script>
    </div>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/home/change_password">Ganti Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <h2 class="mb-0">Change Password</h2>
        </div>
        <div class="card-body">
            <form class="form" action="/home/change_password_action" method="POST" >
                {{ csrf_field() }}
                <input type="hidden" value="{{Auth::user()->nis}}" name="nis">
                <div class="form-group">
                    <label for="inputPasswordOld">Password Lama</label>
                    <input type="password"  name="password_lama"  class="form-control" id="inputPasswordOld" required="">
                </div>
                <div class="form-group">
                    <label for="inputPasswordNew">Password Baru</label>
                    <input type="password" name="password_baru" class="form-control" id="inputPasswordNew" required="">
                </div>
                <div class="form-group">
                    <label for="inputPasswordNewVerify">Ulangi Password Baru</label>
                    <input type="password" name="retype_password_baru" class="form-control" id="inputPasswordNewVerify" required="">
                </div>
                <div class="form-group" style="padding-bottom: 30px;">
                    <input type="submit" class="btn btn-success btn-lg float-right" value="save">
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>©CopyRight By Ardhi-Taufiq 2020</p>
    </footer>
    <!-- <div class="footer">
          </div> -->

</body>

</html>
