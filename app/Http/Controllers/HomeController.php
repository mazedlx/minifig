<?php

namespace App\Http\Controllers;

use App\Image;
use App\Minifig;
use App\Set;

class HomeController extends Controller
{
    /**
     * Show the index page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')
            ->with('minifigs', Minifig::count())
            ->with('sets', Set::count())
            ->with('images', Image::count())
            ->with('latestMinifig', Minifig::latest()->first())
            ->with('latestSet', Set::latest()->first());
    }
}
