<?php
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/minifigs', 'MinifigsController@index');
Route::get('/minifigs/{minifig}', 'MinifigsController@show');

Route::get('/sets', 'SetsController@index');
Route::get('/sets/{set}', 'SetsController@show');

Route::middleware(['auth'])->group(function () {
    Route::get('/minifigs/create', 'MinifigsController@create');
    Route::post('/minifigs', 'MinifigsController@store');
    Route::get('/minifigs/{minifig}/edit', 'MinifigsController@edit');
    Route::patch('/minifigs/{minifig}', 'MinifigsController@update');
    Route::delete('/minifigs/{minifig}', 'MinifigsController@destroy');

    Route::get('/sets/create', 'SetsController@create');
    Route::post('/sets', 'SetsController@store');
    Route::get('/sets/{set}/edit', 'SetsController@edit');
    Route::patch('/sets/{set}', 'SetsController@update');
    Route::delete('/sets/{set}', 'SetsController@destroy');

    Route::delete('/images', 'ImagesController@destroy');
});

