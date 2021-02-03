<?php

namespace App\Http\Controllers\Penjaga;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\PeminjamanExport;
use App\Exports\daftar_hadirExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
use App\Daftar_hadir;
use App\Buku;
use App\Admin;
use App\Peminjaman;
use App\Penjaga;
use UxWeb\SweetAlert\SweetAlert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('penjaga.auth:penjaga');
    }

    /**
     * Show the Penjaga dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $carbon = Carbon::now();
        $date = $carbon->isoFormat('YYYY-MM-DD');
        $siswa = user::count();
        $buku = Buku::count();
        $peminjaman = Peminjaman::count();
        $daftar_hadir = Daftar_hadir::where('tanggal_masuk',$date)->count();
        return view('penjaga.home',['siswa'=>$siswa,'daftar_hadir'=>$daftar_hadir,'buku'=>$buku,'peminjaman'=>$peminjaman,]);
    }
    public function change_password(){
        return view('penjaga.cps');
    }
    public function change_password_action(Request $request){
        $password_lama = $request->password_lama;
        $hashedPassword = Penjaga::find($request->id)->password;
        if (Hash::check($request->password_lama, $hashedPassword)) {
            Penjaga::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'password'=>Hash::make($request->password_baru)
                ],
            );
            return response()->json([
                'message' => "suksess",
                // 'cek'=>'ok'
            ]);
        }
        else{
            return response()->json([
                'message' => "gagal",
                // 'cek'=>$password_lama
            ]);
        }
    }
    public function data_pinjaman(){
        // $buku = Buku::all();

        // $peminjaman = Peminjaman::all();
        $peminjaman =DB::table('peminjaman')
        ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
        ->join('users','users.nis','=','peminjaman.nis')
        ->get();
        return view('penjaga.pinjaman',['data'=> $peminjaman]);
        // return response()->json(['data' => $peminjaman]);
    }
    public function daftar_hadir(){
        // $buku = Buku::all();

        $daftar_hadir =DB::table('daftar_hadir')
        ->join('users', 'users.nis', '=', 'daftar_hadir.nis')
        ->orderBy('tanggal_masuk','desc')
        ->get();

        return view('penjaga.daftar_hadir',['data'=> $daftar_hadir]);
        // return response()->json(['data' => $peminjaman]);
    }
    public function tambah_pinjaman(Request $request){
        $nis = $request->nis;
        $id_buku = $request->id_buku;
        $find_user = User::where('nis',$nis)->count();
        $find_buku = Buku::where('id_buku',$id_buku)->count();
        if ($find_user == 1) {
            if($find_buku == 1){
                $buku = Buku::find($id_buku);
                if ($buku['status'] == 'tersedia') {
                    $sisa_buku = User::find($nis);
                    if($sisa_buku['sisa_buku'] > 0){
                        $carbon = Carbon::now();
                        $tanggal = $carbon->isoFormat('YYYY-MM-DD');
                        $sisa_buku = $sisa_buku['sisa_buku'] - 1;
                        Peminjaman::create([
                            'nis'=>$nis,
                            'id_buku'=>$id_buku,
                            'tanggal_peminjaman'=>$tanggal
                        ]);
                        User::updateOrCreate(
                            [
                                'nis' => $nis
                            ],
                            [
                                'sisa_buku'=>$sisa_buku,
                            ],
                        );
                        Buku::updateOrCreate(
                            [
                                'id_buku' => $id_buku
                            ],
                            [
                                'status'=>'tidak tersedia',
                            ],
                        );
                        return response()->json([ 'success' => true ,'sisa'=>$tanggal]);
                    }
                    else{
                        return response()->json([ 'success' => false ,'messege'=>'Melebihi batas peminjaman']);
                    }
                }
                else{
                    return response()->json([ 'success' => false ,'messege'=>'Buku yang anda masukan sudah di pinjam']);
                }
            }
            else{
                return response()->json([ 'success' => false ,'messege'=>'Masukan id buku dengan benar']);
            }
        }
        elseif($find_user == 0){
            return response()->json([ 'success' => false ,'messege'=>'Masukan nis dengan benar']);
        }
    }
    public function export_excel()
	{
        $carbon = Carbon::now();
        $date = $carbon->isoFormat('DD-MM-YYYY');
		return Excel::download(new PeminjamanExport, 'Laporan_Peminjaman ('.$date.').xlsx');
    }
    public function export_daftar_hadir_excel(Request $request)
	{
        $bulan = $request->bulan;
        // dd($bulan);
        // return response()->json([ 'success' => true ,'sisa_buku'=>$bulan]);
        $carbon = Carbon::now();
        $date = $carbon->isoFormat('DD-MM-YYYY');
        $tahun = $carbon->isoFormat('YYYY');
        $daftar_hadir =DB::table('daftar_hadir')
        ->join('users', 'users.nis', '=', 'daftar_hadir.nis')
        ->whereMonth('tanggal_masuk', $bulan)
        ->whereYear('tanggal_masuk',$tahun)
        ->get();

        if(count($daftar_hadir) != 0){
            return Excel::download(new daftar_hadirExport($bulan,$tahun), 'Laporan_Kehadiran ('.$date.').xlsx');
            // $back = redirect('/penjaga/daftar_hadir');
            // return redirect('/penjaga/daftar_hadir');
        }
        else{
            alert()->error('masukan data dengan benar', 'Warning')->persistent('Close');
                // return r('home',['data'=>$siswa,'peminjaman'=>$peminjaman]);
                // Session::flash('peringatan','Ini notifikasi peringatan');
                return redirect('/penjaga/daftar_hadir',);
        }
	}
    public function pengembalian(Request $request){
        $nis = $request->nis;
        $id_buku = $request->id_buku;
        $find_user = User::where('nis',$nis)->count();
        $find_buku = Buku::where('id_buku',$id_buku)->count();
        if ($find_user == 1) {
            if($find_buku == 1){
                $user = User::find($nis);
                $sisa_buku = $user['sisa_buku'] + 1;
                $peminjaman = Peminjaman::where([['nis','=',$nis],['id_buku','=',$id_buku]])->first();
                $peminjaman->delete();
                User::updateOrCreate(
                    [
                        'nis' => $nis
                    ],
                    [
                        'sisa_buku'=>$sisa_buku,
                    ],
                );
                Buku::updateOrCreate(
                    [
                        'id_buku' => $id_buku
                    ],
                    [
                        'status'=>'tersedia',
                    ],
                );
                return response()->json([ 'success' => true ,'sisa_buku'=>$peminjaman]);
            }
            else{
                return response()->json([ 'success' => false ,'messege'=>'Masukan id buku dengan benar']);
            }
        }
        elseif($find_user == 0){
            return response()->json([ 'success' => false ,'messege'=>'Masukan nis dengan benar']);
        }
    }
}
