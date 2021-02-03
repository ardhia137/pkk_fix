<?php

Route::group(['namespace' => 'Admin'], function() {
    // Dashboard
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/changepassword', 'HomeController@changepassword')->name('admin.cps');
    Route::post('/changepassword/action', 'HomeController@changepassword_action')->name('admin.cpsa');
    Route::get('/data_buku', 'HomeController@data_buku')->name('admin.buku');
    Route::get('/data_buku/edit/{id_buku}', 'HomeController@update');
    Route::post('/data_buku/update/{id_buku}', 'HomeController@edit')->name('admin.edit');
    Route::delete('/data_buku/hapus_buku/{id_buku}', 'HomeController@hapus_buku')->name('admin.hapus_buku');
    Route::post('/data_buku/tambah_buku','HomeController@tambah_buku')->name('admin.tambah_buku');

    Route::get('/data_siswa','HomeController@data_siswa')->name('admin.siswa');
    Route::get('/data_siswa/edit/{nis}', 'HomeController@update_siswa');
    Route::post('/data_siswa/update/{nis}', 'HomeController@edit_siswa')->name('admin.edit_siswa');
    Route::delete('/data_siswa/hapus_siswa/{nis}', 'HomeController@hapus_siswa')->name('admin.hapus_siswa');
    Route::put('/data_siswa/cps_siswa/{nis}', 'HomeController@cps_siswa')->name('admin.cps_siswa');
    Route::post('/data_siswa/tambah_siswa','HomeController@tambah_siswa')->name('admin.tambah_siswa');

    Route::get('/data_admin','HomeController@data_admin')->name('admin.admin');
    Route::get('/data_admin/edit/{id}', 'HomeController@update_admin');
    Route::post('/data_admin/update/{id}', 'HomeController@edit_admin')->name('admin.edit_admin');
    Route::delete('/data_admin/hapus_admin/{id}', 'HomeController@hapus_admin')->name('admin.hapus_admin');
    Route::put('/data_admin/cps_admin/{id}', 'HomeController@cps_admin')->name('admin.cps_admin');
    Route::post('/data_admin/tambah_admin','HomeController@tambah_admin')->name('admin.tambah_admin');

    Route::get('/data_pengurus','HomeController@data_pengurus')->name('admin.pengurus');
    Route::get('/data_pengurus/edit/{id}', 'HomeController@update_pengurus');
    Route::post('/data_pengurus/update/{id}', 'HomeController@edit_pengurus')->name('admin.edit_pengurus');
    Route::delete('/data_pengurus/hapus_pengurus/{id}', 'HomeController@hapus_pengurus')->name('admin.hapus_pengurus');
    Route::put('/data_pengurus/cps_pengurus/{id}', 'HomeController@cps_pengurus')->name('admin.cps_pengurus');
    Route::post('/data_pengurus/tambah_pengurus','HomeController@tambah_pengurus')->name('admin.tambah_pengurus');
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('admin.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
});
