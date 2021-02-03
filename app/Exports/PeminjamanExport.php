<?php

namespace App\Exports;

use App\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
class PeminjamanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {

        $peminjaman =DB::table('peminjaman')
            ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
            ->join('users','users.nis','=','peminjaman.nis')
            ->get();
        return view('peminjaman', [
            'data' => $peminjaman
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

