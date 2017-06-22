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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('divisi', 'DivisiController', ['except' => 'show']);

    Route::resource('karyawan', 'KaryawanController', ['except' => 'show']);

    Route::resource('provider', 'ProviderController', ['except' => 'show']);

    Route::resource('pelatihan', 'PelatihanController', ['except' => 'show']);

    Route::resource('unit_kerja', 'UnitKerjaController', ['except' => 'show']);

    Route::patch('pengusulan/{pengusulan}/approve', 'PengusulanController@approve')->name('pengusulan.approve');
    Route::resource('pengusulan', 'PengusulanController', ['except' => 'show']);

    Route::resource('kuisoner_pelatihan', 'KuisonerPelatihanController', ['except' => 'show']);
});
