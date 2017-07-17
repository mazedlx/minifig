<?php
Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('minifigs', 'MinifigsController');
Route::resource('sets', 'SetsController');
Route::resource('images', 'ImagesController', ['only' => ['destroy']]);

