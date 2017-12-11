<?php

use Illuminate\Http\Request;

Route::get('/minifigs', function () {
    return App\Minifig::paginate(10);
});

Route::get('/minifigs/latest', function() {
     return App\Minifig::latest()->first();
});

Route::get('/minifigs/{minifig}', function ($id) {
    return App\Minifig::find($id);
});

Route::get('/sets', function () {
    return App\Set::paginate(10);
});

Route::get('/sets/latest', function() {
     return App\Set::latest()->first();
});

Route::get('/sets/{minfig}', function ($id) {
    return App\Set::find($id);
});

Route::get('/options/sets', function () {
    return App\Set::orderBy('name', 'asc')->get();
});

Route::delete('/images/{image}', function ($id) {
    $image = App\Image::find($id);
    Storage::disk('public')->delete($image->filename);
    $image->delete();
});
