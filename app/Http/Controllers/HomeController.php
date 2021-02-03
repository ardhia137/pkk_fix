<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\Auth;
use UxWeb\SweetAlert\SweetAlert;
use App\User;
use App\Daftar_hadir;
use App\Buku;
use App\Admin;
use App\Peminjaman;
use App\Penjaga;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $nis = Auth::user()->nis;
        $siswa = User::where('nis',$nis)->get();
        $peminjaman =DB::table('peminjaman')
        ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
        ->where(['nis'=>$nis])
        ->get();
        // $peminjaman = Peminjaman::where('nis',$nis)->get();
        // return $peminjaman;
        return view('home',['data'=>$siswa,'peminjaman'=>$peminjaman]);
    }
    public function cps(){
        return view('cps');
    }
    public function cpsa(Request $request){
        $password_lama = $request->password_lama;
        $password_baru = $request->password_baru;
        $retype_password_baru = $request->retype_password_baru;
        // echo($password_lama);
        $hashedPassword = User::find($request->nis)->password;
        // dd($hashedPassword);
        if($password_baru == $retype_password_baru){
            if (Hash::check($request->password_lama, $hashedPassword)) {

                User::updateOrCreate(
                    [
                        'nis' => $request->nis,
                    ],
                    [
                        'password'=>Hash::make($request->password_baru)
                    ],
                );
                alert()->success('Password telah di ganti', 'Sukses')->persistent('Close');
                return redirect('home/change_password',);
            }
            else{
                alert()->error('Password lama salah', 'error')->persistent('Close');
                return redirect('home/change_password',);
            }
        }
        else{
            alert()->warning('harap masukan password dengan benar', 'Warning')->persistent('Close');
            return redirect('home/change_password',);
        }
    }
    public function absen(Request $request){
        $cek =  $request->nis;
        $cek_siswa = DB::table('users')->where('nis','=',$cek);
        if($cek_siswa->first() != null){
            $tgl = Carbon::today()->toDateString();
            $cek_tgl = DB::table('daftar_hadir')->where('nis','=',$cek)->where('tanggal_masuk', $tgl);
            if ($cek_tgl->first()==null) {
                Daftar_hadir::create([
                    'nis' => $request->nis,
                    'tanggal_masuk' => $tgl,
                    ]);
                    alert()->success('selamat Anda telah absen', 'Sukses')->persistent('Close');
                    // return view('home',['data'=>$siswa,'peminjaman'=>$peminjaman]);
                    // Session::flash('sukses','Ini notifikasi suksess');
		            return redirect('/home');
            } else {
                alert()->warning('Anda telah absen', 'Warning')->persistent('Close');
                // return r('home',['data'=>$siswa,'peminjaman'=>$peminjaman]);
                // Session::flash('peringatan','Ini notifikasi peringatan');
                return redirect('/home',);
                // echo('g');
            }
		    // return redirect('/');
        }else{
            SweetAlert::success('Success Message', 'Optional Title');
            // return view('home',['data'=>$siswa,'peminjaman'=>$peminjaman]);
		    return redirect('/home');
        }
    }
}
