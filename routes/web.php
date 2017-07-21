<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('divisi', 'DivisiController', ['except' => 'show']);

    Route::resource('karyawan', 'KaryawanController', ['except' => 'show']);

    Route::resource('provider', 'ProviderController', ['except' => 'show']);

    Route::resource('pelatihan', 'PelatihanController', ['except' => 'show']);

    Route::resource('unit_kerja', 'UnitKerjaController', ['except' => 'show']);

    Route::patch('pengusulan/{pengusulan}/approve', 'PengusulanController@approve')->name('pengusulan.approve');
    Route::resource('pengusulan', 'PengusulanController', ['except' => 'show']);

    Route::resource('berita_pelatihan', 'BeritaPelatihanController');
    Route::post('berita_pelatihan/{beritaPelatihan}/komentar', 'KomentarBeritaPelatihanController@tambahKomentar')->name('berita_pelatihan.tambah_komentar');

    Route::resource('evaluasi_pelatihan', 'EvaluasiPelatihanController', ['except' => 'show']);

    Route::resource('kategori_pelatihan', 'KategoriPelatihanController', ['except' => 'show']);

    Route::resource('kuisoner_pelatihan', 'KuisonerPelatihanController', ['except' => 'show']);

    Route::get('jawab_kuisoner/{pelatihan}', 'JawabKuisonerPelatihanController@create')->name('jawab_kuisoner.create');
    Route::post('jawab_kuisoner/{pelatihan}', 'JawabKuisonerPelatihanController@store')->name('jawab_kuisoner.store');

    Route::get('jawab_evaluasi/{pelatihan}', 'JawabEvaluasiPelatihanController@create')->name('jawab_evaluasi.create');
    Route::post('jawab_evaluasi/{pelatihan}', 'JawabEvaluasiPelatihanController@store')->name('jawab_evaluasi.store');

    Route::get('peningkatan_pelatihan', 'PeningkatanPelatihanController@index')->name('peningkatan_pelatihan.index');
    Route::post('peningkatan_pelatihan/{pelatihan}', 'PeningkatanPelatihanController@store')->name('peningkatan_pelatihan.store');

    Route::get('hasil_evaluasi', 'HasilEvaluasiController@index')->name('hasil_evaluasi.index');

    Route::get('hasil_kuisoner', 'HasilKuisonerController@index')->name('hasil_kuisoner.index');
});
