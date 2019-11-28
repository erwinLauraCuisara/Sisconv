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

use Symfony\Component\Console\Input\Input;

Route::get('/', function () {
    return view('index');
});
Route::resource('convocatorias','ConvocatoriaController');

Route::get("/storage/convocatorias/{id}/{file}",function ($id,$file){
	return Storage::download("storage/convocatorias/$id/$file");
});

Route::get("/evaluador/convocatorias",'ConvocatoriaController@evaluador');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function(){
Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/register', 'Auth\RegisterAdminController@showRegistrationForm')->name('admin.register');
Route::post('/register', 'Auth\RegisterAdminController@register')->name('admin.register.submit');
Route::get('/','AdminController@index')->name('admin.home');
});
Route::prefix('usuario')->group(function(){
Route::get('/login','Auth\UsuarioLoginController@showLoginForm')->name('usuario.login');
Route::post('/login','Auth\UsuarioLoginController@login')->name('usuario.login.submit');
Route::post('/logout', 'Auth\UsuarioLoginController@logout')->name('usuario.logout');
Route::get('/register', 'Auth\RegisterUsuarioController@showRegistrationForm')->name('usuario.register');
Route::post('/register', 'Auth\RegisterUsuarioController@register')->name('usuario.register.submit');
Route::get('/','UsuarioController@index')->name('usuario.home');
});