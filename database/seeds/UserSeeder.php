<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	'nis' => 123456,
        	'password' => Hash::make('palip'),
        	'nama' => 'palip',
            'tanggal_lahir' => '09-01-2000',
            'kelas'=>'XII RPL 1',
            'jurusan'=>'Rekayasa Perangkat Lunak',
            'alamat'=>'kodim',
            'sisa_buku'=>10
        ]);
    }
}
