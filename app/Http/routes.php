<?php

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

/*Rutas privadas solo para usuarios autenticados*/
Route::group(['middleware' => 'auth'], function ()
{
	Route::get('home', 'HomeController@index');
	Route::resource('impuesto', 'ImpuestoController');
	Route::resource('impuestovencimiento', 'ImpuestoVencimientoController');
	Route::resource('impuestocliente', 'clienteImpuestoController');
	Route::resource('cliente', 'ClienteController');
	Route::resource('tarea', 'clienteTareaController');
});
