<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Buku;
class Peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $fillable = ['id','nis','id_buku','tanggal_peminjaman','updated_at', 'created_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function buku(){
        return $this->belongsTo('App\Buku');
    }
}
