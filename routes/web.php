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

Route::get('/', 'ConvocatoriaUsuarioController@index');


//RUTAS DE CONVOCATORIAS
Route::resource('convocatorias','ConvocatoriaController');
Route::get("/storage/convocatorias/{id}/{file}",function ($id,$file){
	return Storage::download("storage/convocatorias/$id/$file");
});
Route::get('convocatoria/{idConvocatoria}', 'ConvocatoriaController@show')->name('convocatorias.show');
Route::get('convocatoria/{idConvocatoria}/postulantes', 'ConvocatoriaController@calificacionesPostulante')->name('convocatorias.calificacionesPostulante');
Route::get('convocatoria/{idConvocatoria}/postulantes/{idUsuario}', 'ConvocatoriaUsuarioController@getNota')->name('convocatorias.getNota');
Route::get("/storage/convocatorias/{id}/reqGenerales/{file}",function ($id,$file){
	return Storage::download("storage/convocatorias/$id/reqGenerales/$file");
});
Route::get("/storage/convocatorias/{id}/reqIndispensables/{file}",function ($id,$file){
	return Storage::download("storage/convocatorias/$id/reqIndispensables/$file");
});


//RUTAS DE ROLES
Route::resource('roles','RoleController');

//RUTAS DE REQUISITOS
Route::resource('requisitos','RequisitoController');
Route::get("requisitos/add/{requisito}",'RequisitoController@agregar')->name('requisitos.agregar');

//RUTAS DE REQUERIMIENTOS
Route::resource('requerimientos','RequerimientoController');
Route::get("requerimientos/add/{requerimiento}",'RequerimientoController@agregar')->name('requerimientos.agregar');

//RUTAS DE SECCIONES
Route::resource('secciones','SeccionController');
Route::get("secciones/add/{seccion}",'SeccionController@agregar')->name('secciones.agregar');

//RUTAS DE SUBSECCIONES
Route::resource('subsecciones','SubSeccionController');
Route::get("subsecciones/add/{subseccion}",'SubSeccionController@agregar')->name('subsecciones.agregar');

//RUTAS DE ITEMS
Route::resource('items','ItemController');
Route::get("items/add/{item}",'ItemController@agregar')->name('items.agregar');

//Rutas de Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Rutas de Registro
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


//Rutas de Registro Receptor
Route::get('register/receptor', 'Auth\RegisterController@showRegistrationFormReceptor')->name('register');
Route::post('register/receptor', 'Auth\RegisterController@registerReceptor');

//Rutas de Registro Evaluador
Route::get('register/evaluador', 'Auth\RegisterController@showRegistrationFormEvaluador')->name('register');
Route::post('register/evaluador', 'Auth\RegisterController@registerEvaluador');

//Rutas de Recuperar Contraseña
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
 

//Rutas para postular  {

	//ruta para el poner el codigo
	Route::get("/postular/{idConvocatoria}",function ($idConvocatoria){
	return view('postulante.codigo')->with(compact('idConvocatoria'));
	})->name('postular.codigo');

	//ruta para mostrar los requerimientos indispensables
	Route::get("/postular/requerimientosIndispensables/{idConvocatoria}",'PostularController@getRequisitosIndispensables')->name('postular.getRequisitosIndispensables');

	//ruta para guardar los pdf de los requerimientos indispensables
	Route::post("/postular/requerimientosIndispensables/add/{idConvocatoria}",'PostularController@setRequisitosIndispensables')->name('postular.setRequisitosIndispensables');

	//ruta para guardar los pdf de los requerimientos generales
	Route::post("/postular/requerimientosGenerales/add/{idConvocatoria}/{contador}",'PostularController@addRequisitosGenerales')->name('postular.addRequisitosGenerales');

	//ruta para guardar los items
	Route::post("/postular/items/add/{idItem}/{contador}",'PostularController@addItems')->name('postular.addItems');

	//}

	//Ruta para receptor
	Route::get("/receptor/{idConvocatoria}",'RequisitoController@receptorShow')->name('receptor.show');

	Route::get("/receptor/evaluar/{idConvocatoria}/{idUser}",'RequisitoController@evaluar')->name('receptor.evaluar');
	Route::get("/receptor/evaluar/save/{idConvocatoria}/{idUser}",'RequisitoController@evaluarSave')->name('receptor.evaluarSave');


	//rutas para evaluador
	Route::get("/evaluador/{idConvocatoria}",'RequerimientoController@requerimientosShow')->name('evaluador.show');

	Route::get("/evaluador/show/{idConvocatoria}/{idUser}",'RequerimientoController@showItems')->name('evaluador.showItems');

	Route::get("/evaluador/save/{idItem}/{idUsuario}",'RequerimientoController@save')->name('evaluador.save');
	Route::get("/evaluador/show/{idConvocatoria}/{idUser}/{contador}",'RequerimientoController@siguiente')->name('evaluador.siguiente');



Route::resource('postular','PostularController');

//

Route::get("/receptor/convocatorias",'ConvocatoriaController@receptor');


Route::get('/home', 'HomeController@index');


Route::get("/postular/{codigo}",function ($codigo){
	return view('convocatorias.formRequerimientos')->with(compact('requerimiento'));;
});


