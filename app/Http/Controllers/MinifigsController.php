<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Image;
use App\Minifig;
use App\Set;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MinifigsController extends Controller
{
    /**
     * Return the index view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('minifigs.index');
    }

    /**
     * Show a minifig
     *
     * @param  Minifig $minifig
     * @return \Illuminate\Http\Response
     */
    public function show(Minifig $minifig)
    {
        return view('minifigs.show');
    }

    /**
     * Show the form for creating a new minifig
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('minifigs.create');
    }

    /**
     * Store a new minifig in the database
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required'],
            'set_id' => ['required', 'numeric', 'exists:sets,id'],
            'files.*' => ['sometimes', 'image'],
        ]);

        $minifig = Minifig::create($data);

        if(request()->hasFile('files')) {
            collect(request()->file('files'))->each(function ($file) use ($minifig) {

                $image = Image::create([
                    'minifig_id' => $minifig->id,
                    'filename' => $file->store('images', 'public')
                ]);
                $minifig->images()->save($image);
            });
        }

        return $minifig;
    }

    /**
     * Show the form for editing a minifig
     *
     * @param  Minifig $minifig
     * @return \Illuminate\Http\Response
     */
    public function edit(Minifig $minifig)
    {
        return view('minifigs.edit');
    }

    /**
     * Show the form for updating a minifig
     *
     * @param  Minifig        $minifig
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Minifig $minifig, Request $request)
    {
        $data = request()->validate([
            'name' => ['required'],
            'set_id' => ['required', 'numeric', 'exists:sets,id'],
        ]);

        $minifig->update($data);

        if (request()->images_to_delete) {
            collect(request()->images_to_delete)->each(function ($id) {
                $image = Image::find($id);
                Storage::delete($image->filename);
                $image->delete();
            });
        }

        if(request()->hasFile('files')) {
            collect(request()->file('files'))->each(function ($file) use ($minifig) {
                $image = Image::create([
                    'minifig_id' => $minifig->id,
                    'filename' => $file->store('images', 'public')
                ]);
                $minifig->images()->save($image);
            });
        }

        return redirect()->action('MinifigsController@index')->with('msg', 'Minifig saved');
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
        $minifig->images->each(function ($image) {
            Storage::disk('public')->delete($image->filename);
            $image->delete();
        });
        $minifig->delete();

        return redirect()->action('MinifigsController@index')->with('msg', 'Minifig deleted');
    }
}
