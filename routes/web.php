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
<<<<<<< HEAD


Route::get('/form', function () {
    return view('form');
})->name('registrar'); 
=======
Route::get('/convocatorias', function () {
    return view('convocatorias.index');
});
>>>>>>> 4782687f85c3fea5db5e28633374055d15f30976
