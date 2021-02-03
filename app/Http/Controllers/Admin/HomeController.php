<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
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
        return view('admin.home',['siswa'=>$siswa,'daftar_hadir'=>$daftar_hadir,'buku'=>$buku,'peminjaman'=>$peminjaman]);
    }
    public function changepassword(){
        return view('admin.cps');
    }
    public function changepassword_action(Request $request){
        $password_lama = $request->password_lama;
        $hashedPassword = Admin::find($request->id)->password;
        if (Hash::check($request->password_lama, $hashedPassword)) {
            Admin::updateOrCreate(
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
        // Admin::updateOrCreate(
        //     [
        //         'id' => $id
        //     ],
        //     [
        //         'password'=>Hash::make('adminsmkn1cibinong')
        //     ],
        // );
        // return response()->json([
        //     'message' => "suksess"
        // ]);
    }
    public function data_buku(){
        $buku = Buku::all();

        return view('admin.buku',['buku'=> $buku]);
    }
    public function update($id_buku){
        $buku = Buku::find($id_buku);
	    return response()->json([
            'data' => $buku
	    ]);
    }

    public function edit(Buku $buku,Request $request, $id_buku){
    Buku::updateOrCreate(
        [
            'id_buku' => $id_buku
        ],
        [
            'jenis_buku' => $request->jenis_buku,
            'nama_buku' => $request->nama_buku,
            'status' => $request->status,
            'tahun_terbit' => $request->tahun_terbit,
        ],
    );
    return response()->json([ 'success' => true ,'jumlah'=>$request->jumlah]);
    }
    public function hapus_buku($id_buku){
        $buku = Buku::find($id_buku);
        // print($buku);
        $buku->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
    public function tambah_buku(Request $request){
        $x=1;
        $jumlah = $request->jumlah;
        $nama = $request->nama_buku;
        $status = $request->status;
        $tahun = $request->tahun_terbit;
        $jenis = $request->jenis_buku;
        while($x <= $jumlah){
            $id = "10".rand(0000,9999);
            Buku::create([
                'id_buku'=>$id,
                'nama_buku'=> $nama,
                'jenis_buku'=>$jenis,
                'status'=>$status,
                'tahun_terbit'=>$tahun,
            ]);
            $x++;
        };
        return response()->json([ 'success' => true ,]);
    }


    public function data_siswa(){
        $siswa = User::all();
        return view('admin.siswa',['siswa'=> $siswa]);
    }
    public function tambah_siswa(Request $request){
        $sisa_buku = 10;
        User::create([
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'kelas'=>$request->kelas,
            'jurusan'=>$request->jurusan,
            'alamat'=>$request->alamat,
            'sisa_buku'=>$sisa_buku,
            'password'=>Hash::make('smkn1cibinong')
        ]);
        return response()->json([ 'success' => true ,]);
    }
    public function hapus_siswa($nis){
        $buku = User::find($nis);
        // print($buku);
        $buku->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
    public function update_siswa($nis){
        $siswa = User::find($nis);
	    return response()->json([
            'data' => $siswa
	    ]);
    }
    public function edit_siswa(Request $request, $nis){
        User::updateOrCreate(
            [
                'nis' => $nis
            ],
            [
                'nama'=>$request->nama,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'kelas'=>$request->kelas,
                'jurusan'=>$request->jurusan,
                'alamat'=>$request->alamat,
            ],
        );
        return response()->json([ 'success' => true]);
        }
        public function cps_siswa($nis){
            User::updateOrCreate(
                [
                    'nis' => $nis
                ],
                [
                    'password'=>Hash::make('smkn1cibinong')
                ],
            );
            return response()->json([
                'nis' => $nis
            ]);
        }



        public function data_admin(){
            $admin = Admin::all();
            return view('admin.admin',['admin'=> $admin]);
        }
        public function tambah_admin(Request $request){

            Admin::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make('adminsmkn1cibinong')
            ]);
            return response()->json([ 'success' => true ,]);
        }
        public function hapus_admin($id){
            $admin = Admin::find($id);
            // print($buku);
            $admin->delete();
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
        public function cps_admin($id){
            Admin::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'password'=>Hash::make('adminsmkn1cibinong')
                ],
            );
            return response()->json([
                'message' => "suksess"
            ]);
        }
        public function update_admin($id){
            $admin = Admin::find($id);
            return response()->json([
                'data' => $admin
            ]);
        }
        public function edit_admin(Request $request, $id){
            Admin::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                ],
            );
            return response()->json([ 'success' => true]);
            }



            public function data_pengurus(){
                $pengurus = Penjaga::all();
                return view('admin.pengurus',['pengurus'=> $pengurus]);
            }
            public function tambah_pengurus(Request $request){

                Penjaga::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make('pengurussmkn1cibinong')
                ]);
                return response()->json([ 'success' => true ,]);
            }
            public function cps_pengurus($id){
                Penjaga::updateOrCreate(
                    [
                        'id' => $id
                    ],
                    [
                        'password'=>Hash::make('pengurussmkn1cibinong')
                    ],
                );
                return response()->json([
                    'message' => "suksess"
                ]);
            }
            public function hapus_pengurus($id){
                $pengurus = Penjaga::find($id);
                // print($buku);
                $pengurus->delete();
                return response()->json([
                    'message' => 'Data deleted successfully!'
                ]);
            }
            public function update_pengurus($id){
                $pengurus = Penjaga::find($id);
                return response()->json([
                    'data' => $pengurus
                ]);
            }
            public function edit_pengurus(Request $request, $id){
                Penjaga::updateOrCreate(
                    [
                        'id' => $id
                    ],
                    [
                        'name'=>$request->name,
                        'email'=>$request->email,
                    ],
                );
                return response()->json([ 'success' => true]);
                }

}
