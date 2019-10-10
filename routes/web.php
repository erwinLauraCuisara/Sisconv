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
    return view('index');
});
Route::get('/convocatorias', function () {
    return view('convocatorias.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');    
    Route::get('/','AdminController@index')->name('admin.dashboard');
    Route::get('/logout','AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('usuario')->group(function(){
    Route::get('login', 'Auth\UsuarioLoginController@showLoginForm')->name('usuario.login');
    Route::post('login', 'Auth\UsuarioLoginController@login')->name('usuario.login.submit');    
    Route::get('/','UsuarioController@index')->name('usuario.dashboard');
    Route::get('/logout','UsuarioLoginController@logout')->name('usuario.logout');
});

