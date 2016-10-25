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

Route::get('/', function () {
    return view('welcome');
});

Route::get('eventos', function()
{
    return View::make('pages.eventos');
});

Route::get('pais','EdicionesController@edicionEditando');

/*
* Routes para Edicion...
*/
Route::group(['prefix'=>'edicion'],function(){
	Route::resource('ediciones','EdicionesController');
	Route::get('ediciones/{id}/destroy',[
		'uses' => 'EdicionesController@destroy',
		'as' => 'edicion.ediciones.destroy'
		]);
	Route::get('editando',[
		'uses' => 'EdicionesController@edicionEditando',
		'as' => 'edicion.ediciones.editando'
		]);
});

/*
* Routes para Evento...
*/
Route::group(['prefix'=>'evento'],function(){
	Route::resource('eventos','EventosController');
	Route::get('eventos/{id}/destroy',[
		'uses' => 'EventosController@destroy',
		'as' => 'evento.eventos.destroy'
		]);
	Route::get('eventos/{id}/{edit_delete}',[
		'uses' => 'EventosController@show',
		'as' => 'evento.eventos.show'
		]);
});

/*
* Routes para Modulo...
*/
Route::group(['prefix'=>'contenido'],function(){
	Route::resource('contenidos','ModuloController');
	Route::get('contenido/{id}/destroy',[
		'uses' => 'ModuloController@destroy',
		'as' => 'contenido.contenidos.destroy'
		]);
	Route::get('modulos/{id}/{edit_delete}',[
		'uses' => 'ModuloController@show',
		'as' => 'contenido.contenidos.show'
		]);
});

/*
* Routes para User...
*/
Route::group(['prefix'=>'user'],function(){
	Route::resource('users','UserController');
	Route::get('users/{id}/destroy',[
		'uses' => 'UserController@destroy',
		'as' => 'user.users.destroy'
		]);
	Route::get('users/{id}/{edit_delete}',[
		'uses' => 'UserController@show',
		'as' => 'user.users.show'
		]);
	Route::get('profile',[
		'uses' => 'UserController@profile',
		'as' => 'user.profile.profile'
		]);
});


/*
* Routes para App...
*/
Route::group(['prefix'=>'app'],function(){
	Route::get('edicion',[
		'uses' => 'AplicacionController@edicion',
		'as' => 'eventos'
		]);
	Route::get('eventos',[
		'uses' => 'AplicacionController@eventos',
		'as' => 'eventos'
		]);
});

/*
* Routes para Usuarios...
*/
Route::group(['prefix'=>'usuario'],function(){
});

/*
* Routes para Login...
*/
Route::auth();

Route::get('/home', 'HomeController@index');
