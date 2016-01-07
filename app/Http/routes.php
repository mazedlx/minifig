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

/**
 * Home
 */
Route::get('/', function () {
	return view('index')
		->with('minifigs', App\Minifig::count())
		->with('sets', App\Set::count())
		->with('images', App\Image::count());
});

Route::resource('minifigs', 'MinifigController');
Route::resource('sets', 'SetController');
Route::resource('images', 'ImageController', ['only' => ['destroy']]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
