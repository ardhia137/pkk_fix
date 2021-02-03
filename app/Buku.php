<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'buku';
    protected  $primaryKey = 'id_buku';
    protected $fillable = ['id_buku','nama_buku','status','tahun_terbit','jenis_buku', 'created_at','updated_at'];

    public function peminjaman()
    {
        return $this->hasMany('App\Peminjaman');
    }
}
