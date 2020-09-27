<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', function () {
    return view('pengguna.login');
})->name('login');

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');




Route::get('/post', function () {
    return view('post');
});

//CRUD
Route::resource('post', 'PostController');



Route::group(['middleware' => ['auth:user', 'CekLevel:admin']], function () {
    route::get('/halaman-satu', 'BerandaController@halamansatu')->name('halaman-satu');
});

Route::group(['middleware' => ['auth:user,pengguna', 'CekLevel:admin,editor,penulis']], function () {
    route::get('/beranda', 'BerandaController@index');
    route::get('/halaman-dua', 'BerandaController@halamandua')->name('halaman-dua');
    
    
});
Route::group(['middleware' => ['auth:pengguna', 'CekLevel:penulis']], function () {
    route::get('/halaman-tiga', 'BerandaController@halamantiga')->name('halaman-tiga');
    
});