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
Route::resource('requisitos','RequisitoController');
Route::resource('requerimientos','RequerimientoController');
Route::resource('secciones','SeccionController');
Route::resource('subsecciones','SubSeccionController');
Route::resource('items','ItemController');




Route::get("/storage/convocatorias/{id}/{file}",function ($id,$file){
	return Storage::download("storage/convocatorias/$id/$file");
});

Route::get("/storage/convocatorias/{id}/{file}",function ($id,$file){
	return Storage::download("storage/convocatorias/$id/$file");
});

Route::get("/evaluador/convocatorias",'ConvocatoriaController@evaluador');


Route::get("requisitos/add/{requisito}",'RequisitoController@agregar')->name('requisitos.agregar');

Route::get("requerimientos/add/{requerimiento}",'RequerimientoController@agregar')->name('requerimientos.agregar');

Route::get("secciones/add/{seccion}",'SeccionController@agregar')->name('secciones.agregar');
Route::get("subsecciones/add/{subseccion}",'SubSeccionController@agregar')->name('subsecciones.agregar');
Route::get("items/add/{item}",'ItemController@agregar')->name('items.agregar');

