<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar_hadir extends Model
{
    //
    protected $table = 'daftar_hadir';
    protected $fillable = ['id','nis','tanggal_masuk','updated_at', 'created_at'];
}
