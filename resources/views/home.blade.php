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
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/home/change_password">Ganti Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6" style="padding-top: 2%;">
                <img src="{{asset('assets/image/kritik-saran.jpg')}}"
                    style="width: 150px; height: 200px; float: left;"></img>
                    @foreach($data as $q)
            <p>&nbsp NIS : {{$q->nis}}</br>
                    &nbsp Nama : {{$q->nama}}</br>
                    &nbsp Kelas : {{$q->kelas}}</br>
                    &nbsp Jurusan : {{$q->jurusan}}</br>
                    &nbsp Tanggal Lahir : {{$q->tanggal_lahir}}
                </br>
                @endforeach
                <form action="/home/absen" method="POST">
                    {{ csrf_field() }}
                    <label class="form-check-label" style="margin-left: 30px;">
                    <input type="checkbox" name="nis" class="form-check-input" value="{{ Auth::user()->nis }}">Absen
                    </label>
                    <br>
                    <input type="submit" class="btn btn-success" style="margin-left: 10px;" value="submit">
                </form>
                </p>
            </div>
            <div class="col-sm-6" style="padding-top: 2%;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Buku</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($peminjaman as $no =>$p)
                        <td>{{++$no}}</td>
                            <td>{{$p->id_buku}}</td>
                            <td>{{$p->nama_buku}}</td>
                            <td>{{$p->tanggal_peminjaman}}</td>
                            <td>Belum Dikembalikan</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    </div><br>
    <footer>
        <p>©CopyRight By Ardhi-Topik 2020</p>
    </footer>
    <!-- <div class="footer">
          </div> -->

</body>

</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div>
@endsection --}}
