<?php
Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('minifigs', 'MinifigsController')->middleware('auth', ['except' => ['index', 'show']]);;
Route::resource('sets', 'SetsController')->middleware('auth', ['except' => ['index', 'show']]);;
Route::delete('images', 'ImagesController@destroy')->middleware('auth');

