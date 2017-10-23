<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\NullFile;
use App\Set;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SetsController extends Controller
{
    /**
     * Show all sets
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sets.index');
    }

    /**
     * Show the set
     *
     * @param  Set $set
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        return view('sets.show');
    }

    /**
     * Show the form for creating a new set
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sets.create');
    }

    /**
     * Save a new set to the database
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'number' => ['required'],
            'file' => ['sometimes', 'image'],
        ]);

        $set = Set::create([
            'name' => request('name'),
            'number' => request('number'),
            'filename' => request('file', new NullFile)->store('images', 'public'),
        ]);

        return $set;
    }

    /**
     * Show the form for editing a set
     *
     * @param  Set $set
     * @return \Illuminate\Http\Response
     */
    public function edit(Set $set)
    {
        return view('sets.edit')
            ->with('set', $set);
    }

    /**
     * Update the set in the database
     *
     * @param  Set        $set
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Set $set, Request $request)
    {
        $data = request()->validate([
            'name' => ['required'],
            'number' => ['required'],
            'file' => ['sometimes', 'image'],
        ]);

        $set->update($data);

        if($request->file('file') && $request->file('file')->isValid()) {
            $request->file('file')
                    ->storeAs('public', 'set_' . $set->id . '.' . $request->file('file')->extension());

            $set->update([
                'filename' => 'set_' . $set->id . '.' . $request->file('file')->extension(),
            ]);
        }

        return redirect()->action('SetsController@index')->with('msg', 'Set saved');
    }

    /**
     * Delete the set from the database
     *
     * @param  Set     $set
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set, Request $request)
    {
        $set->minifigs->each(function ($minifig) {
            $minifig->images->each(function ($image) {
                Storage::disk('public')->delete($image->filename);
                $image->delete();
            });
            $minifig->delete();
        });
        Storage::disk('public')->delete($set->filename);
        $set->delete();

        return redirect()->action('SetsController@index')->with('msg', 'Set deleted');
    }
}
