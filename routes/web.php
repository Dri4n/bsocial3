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


Route::Auth();

// 'prefix' => LaravelLocalization::setLocale(),

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['auth','localeSessionRedirect', 'localizationRedirect']], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');

	/* 
	|--------------------------------------------------------------------------
	| Rutas User
	|--------------------------------------------------------------------------
	*/

		// Vistas
		Route::get('/users','UsersController@index');
		Route::get('/users/{user}','UsersController@edit');

		// Methods
		Route::post('/users/{user}/avatar','UsersController@update_avatar');
		Route::put('/users/{user}/update_personal_info','UsersController@update_personal_info');
		Route::put('/users/{user}/update_account_info','UsersController@update_account_info');
		Route::delete('/users/{user}/delete','UsersController@destroy');

	/* 
	|--------------------------------------------------------------------------
	| Rutas Campus
	|--------------------------------------------------------------------------
	*/

		// Vistas
		Route::get('campus/{campus}','CampusController@show');
		Route::get('campus/{campus}/users','CampusController@users');
});


