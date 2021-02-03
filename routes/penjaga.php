<?php

Route::group(['namespace' => 'Penjaga'], function() {
    // Dashboard
    Route::get('/', 'HomeController@index')->name('penjaga.home');
    Route::get('/change_password', 'HomeController@change_password')->name('penjaga.change_password');
    Route::post('/change_password/action', 'HomeController@change_password_action')->name('penjaga.change_password_action');
    Route::get('/data_pinjaman', 'HomeController@data_pinjaman')->name('penjaga.pinjaman');
    Route::get('/daftar_hadir', 'HomeController@daftar_hadir')->name('penjaga.daftar_hadir');
    Route::post('/data_pinjaman/tambah_pinjaman','HomeController@tambah_pinjaman')->name('penjaga.tambah_pinjaman');
    Route::post('/data_pinjaman/pengembalian','HomeController@pengembalian')->name('penjaga.pengembalian');
    Route::get('/data_pinjaman/export_excel', 'HomeController@export_excel')->name('excel.peminjaman');;
    Route::post('/daftar_hadir/export_daftar_hadir_excel', 'HomeController@export_daftar_hadir_excel')->name('excel.daftar_hadir');
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('penjaga.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('penjaga.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('penjaga.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('penjaga.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('penjaga.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('penjaga.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('penjaga.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('penjaga.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('penjaga.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('penjaga.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('penjaga.verification.resend');
});
