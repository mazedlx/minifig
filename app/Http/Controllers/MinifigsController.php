<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\MinifigRequest;
use App\Http\Controllers\Controller;
use App\Minifig;
use App\Set;
use App\Image;

class MinifigsController extends Controller
{
    /**
     * Class constructor. Load the auth middleware except for the given routes
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Return the index view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('minifigs.index')
            ->with('minifigs', Minifig::orderBy('name', 'asc')->paginate(10));
    }

    /**
     * Show a minifig
     *
     * @param  Minifig $minifig
     * @return \Illuminate\Http\Response
     */
    public function show(Minifig $minifig)
    {
        return view('minifigs.show')
            ->with('minifig', $minifig)
            ->with('set', $minifig->set)
            ->with('images', $minifig->images);
    }

    /**
     * Show the form for creating a new minifig
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('minifigs.create')
            ->with('sets_id', Set::orderBy('name', 'asc')->pluck('name', 'id'));
    }

    /**
     * Store a new minifig in the database
     *
     * @param  MinifigRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MinifigRequest $request)
    {
        $minifig = Minifig::create([
            'name' => $request->name,
            'set_id' => $request->set_id
        ]);

        if($request->hasFile('files')) {
            collect($request->file('files'))->each(function ($file) use ($minifig) {
                $path = $file->store('public');
                $minifig->images()->create([
                    'filename' => explode('/', $path)[1]
                ]);
            });
        }

        $request->session()->flash('msg', 'Minifig created');
        return redirect()->action('MinifigsController@index');
    }

    /**
     * Show the form for editing a minifig
     *
     * @param  Minifig $minifig
     * @return \Illuminate\Http\Response
     */
    public function edit(Minifig $minifig)
    {
        return view('minifigs.edit')
            ->with('sets_id', Set::orderBy('name', 'asc')->pluck('name', 'id'))
            ->with('images', $minifig->images)
            ->with('minifig', $minifig);
    }

    /**
     * Show the form for updating a minifig
     *
     * @param  Minifig        $minifig
     * @param  MinifigRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Minifig $minifig, MinifigRequest $request)
    {
        $minifig->update([
            'name' => $request->name,
            'set_id' => $request->set_id,
        ]);

        if ($request->images_to_delete) {
            collect($request->images_to_delete)->each(function ($id) {
                Image::find($id)->delete();
            });
        }

        if($request->hasFile('files')) {
            collect($request->file('files'))->each(function ($file) use ($minifig) {
                $path = $file->store('public');
                $minifig->images()->create([
                    'filename' => explode('/', $path)[1]
                ]);
            });
        }

        $request->session()->flash('msg', 'Minifig saved');
        return redirect()->action('MinifigsController@index');
    }

    /**
     * Delete a minifig from the database
     *
     * @param  Minifig $minifig
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Minifig $minifig, Request $request)
    {
        $minifig->delete();

        $request->session()->flash('msg', 'Minifig deleted');
        return redirect()->action('MinifigsController@index');
    }
}
