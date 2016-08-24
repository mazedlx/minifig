<?php
Auth::routes();

Route::get('/', function () {
    return view('index')
        ->with('minifigs', App\Minifig::count())
        ->with('sets', App\Set::count())
        ->with('images', App\Image::count())
        ->with('latest_minifig', App\Minifig::latest())
        ->with('latest_set', App\Set::latest());
});

Route::resource('minifigs', 'MinifigController');
Route::resource('sets', 'SetController');
Route::resource('images', 'ImageController', ['only' => ['destroy']]);
