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

Route::get("/storage/convocatorias/{file}",function ($file){
	return Storage::download("storage/convocatorias/$file");
});
