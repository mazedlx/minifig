<?php

use Illuminate\Http\Request;

Route::get('/minifigs', function () {
    return App\Minifig::paginate(10);
});

Route::get('/minifigs/latest', function() {
     return App\Minifig::latest()->first();
});

Route::get('/minifigs/{minifig}', function ($minifig) {
    return App\Minifig::find($minifig);
});

Route::get('/sets', function () {
    return App\Set::paginate(10);
});

Route::get('/sets/latest', function() {
     return App\Set::latest()->first();
});

Route::get('/sets/{minfig}', function ($set) {
    return App\Set::find($set);
});

Route::get('/options/sets', function () {
    return App\Set::orderBy('name', 'asc')->get();
});
