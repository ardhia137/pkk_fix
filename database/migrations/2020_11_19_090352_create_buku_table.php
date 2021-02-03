<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            // $table->increments('id_buku');
            $table->bigIncrements('id_buku');
            $table->String('jenis_buku',255);
            $table->String('nama_buku',255);
            $table->String('status',255);
            $table->integer('tahun_terbit');
            // $table->String('jenis_buku',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
