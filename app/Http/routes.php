<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Redirige a la vista para realizar el registro
Route::get('register','LoginController@registrar');

//Toma los datos del formulario de registro y si estan correctos crea el usuario
Route::post('create', 'LoginController@create');

//Valida email y password con la BD, si estan correctos loguea el usuario y redirige a mesas 
Route::post('check', 'LoginController@check');

//Destruye la session del usuario y redirige al login
Route::get('logout', 'LoginController@logout');

//Cuando se solicite la raiz, se verifica si el usuario esta logueado, si es asi se redirige a las mesas, si no se redirige al login
Route::get('/',function(){
	if(Auth::guest()){
		return view ('login');
	}else{
		return redirect()->action('MesaController@index');
	}
});

//Cuando se solicite el login, se verifica si el usuario esta logueado, si es asi se redirige a las mesas, si no se redirige al login
Route::get('login',function(){
	if(Auth::guest()){
		return view ('login');
	}else{
		return redirect()->action('MesaController@index');
	}
});

//Cuando se solicite el registro, se verifica si el usuario esta logueado, si es asi se redirige a las mesas, si no se redirige al login
Route::get('register',function(){
	if(Auth::guest()){
		return view ('registrar');
	}else{
		return redirect()->action('MesaController@index');
	}
});


//para acceder a las rutas el usuario debe estar logueado

Route::group(['middleware' => 'auth'], function () {

 	Route::resource('categorias', 'CategoriaController');

	Route::get('mesas', 'MesaController@index');

	Route::resource('mesas','MesaController');


	Route::post('putmesa','MesaController@actualizar');

	Route::resource('anuncios','AnuncioController');

	Route::resource('publicaciones','PublicacionController');

	Route::get('publicaciones/{categoria}/e1/{id}', 'PublicacionController@deshabilitar');

	Route::get('categorias/{mesa}/e1/{id}','CategoriaController@deshabilitar');

	Route::get('mesas/e1/{id}','MesaController@deshabilitar');

	Route::get('busqueda/{filtro}', 'MesaController@busqueda');

	Route::get('comentarios/e1/{id}','ComentarioController@deshabilitar');

	Route::resource('comentarios','ComentarioController');

	Route::get('anuncios/e1/{id}','AnuncioController@deshabilitar');


});

	
