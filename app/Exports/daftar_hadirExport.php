<?php

namespace App\Exports;

use App\Daftar_hadir;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class daftar_hadirExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $bulan,$tahun )
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }
    public function view(): View
    {
        // $peminjaman = Peminjaman::where('nis',$this->nis)->get();
        // dd($this->tahun);

        // return
        $daftar_hadir =DB::table('daftar_hadir')
        ->join('users', 'users.nis', '=', 'daftar_hadir.nis')
        ->whereMonth('tanggal_masuk', $this->bulan)
        ->whereYear('tanggal_masuk',$this->tahun)
        ->get();
        return view('daftar_hadir', [
            'data' => $daftar_hadir
        ]);
    }
    // public function collection()
    // {
    //     $peminjaman =DB::table('peminjaman')
    //     ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
    //     ->join('users','users.nis','=','peminjaman.nis')
    //     ->get();
    //     return $peminjaman;
    // }
}

