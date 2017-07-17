<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SetRequest;
use Illuminate\Http\UploadedFile;
use App\Set;

class SetsController extends Controller
{
    /**
     * Class constructor. Load the auth middleware except for the given routes
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show all sets
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sets.index')
            ->with('sets', Set::orderBy('name', 'asc')->paginate(10));
    }

    /**
     * Show the set
     *
     * @param  Set $set
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        return view('sets.show')
            ->with('set', $set)
            ->with('minifigs', $set->minifigs);
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
     * @param  SetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SetRequest $request)
    {
        $set = Set::create([
            'name' => $request->name,
            'number' => $request->number,
        ]);

        if($request->file('file') && $request->file('file')->isValid()) {
            $request->file('file')
                    ->storeAs('public', 'set_' . $set->id . '.' . $request->file('file')->extension());

            $set->update([
                'filename' => 'set_' . $set->id . '.' . $request->file('file')->extension(),
            ]);
        }

        $request->session()->flash('msg', 'Set created');
        return redirect()->action('SetsController@index');
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
     * @param  SetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Set $set, SetRequest $request)
    {
        $set->update([
            'name' => $request->name,
            'number' => $request->number,
        ]);

        if($request->file('file') && $request->file('file')->isValid()) {
            $request->file('file')
                    ->storeAs('public', 'set_' . $set->id . '.' . $request->file('file')->extension());

            $set->update([
                'filename' => 'set_' . $set->id . '.' . $request->file('file')->extension(),
            ]);
        }

        $request->session()->flash('msg', 'Set saved');
        return redirect()->action('SetsController@index');
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
        $set->delete();

        $request->session()->flash('msg', 'Set deleted');
        return redirect()->action('SetsController@index');
    }
}
