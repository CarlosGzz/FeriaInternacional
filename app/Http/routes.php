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

Route::get('/x', function () {
    return "helo world";
});

Route::get('eventos', function()
{
    return View::make('pages.eventos');
});

// SUPER ADMIN ROUTES 

/*Route::group(['prefix' => 'eventos'],function(){
	Route::get('eventos2',['uses'=> 'EventoController@viewCalendario', 
		'as' => 'eventos'
		]);
});*/
/*Route::get('eventos2',['uses'=> 'EventoController@viewCalendario', 
		'as' => 'eventos'
		]);*/
//Route::resource('admin', 'AdministradorContoller');

/*
* Routes for Edicion...
*/
Route::group(['prefix'=>'edicion'],function(){
	Route::resource('ediciones','EdicionesController');
	Route::get('ediciones/{id}/destroy',[
		'uses' => 'EdicionesController@destroy',
		'as' => 'edicion.ediciones.destroy'
		]);
	Route::get('ediciones/{id}/{edit_delete}',[
		'uses' => 'EdicionesController@show',
		'as' => 'edicion.ediciones.show'
		]);
});

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

Route::auth();

Route::get('/home', 'HomeController@index');
