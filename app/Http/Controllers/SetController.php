<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Set;

class SetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update']]);
    }
    public function index()
    {
        $sets = Set::all();
        return view('sets')->with('sets', $sets);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
               'name'        => 'required|max:255',
               'number'    => 'required|max:255',
        ]);

        $uploadpath = 'uploads';
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $filename = sha1(rand(1, 100000).time()) . '.' . $request->file('file')->guessExtension();
                $request->file('file')->move($uploadpath, $filename);
                $set->filename = $filename;
            }
        } else {
            $filename = '';
        }

        $set = Set::create(
            array(
                'name'        => $request->name,
                'number'    => $request->number,
                'filename'    => $filename
            )
        );

        $request->session()->flash('msg', 'Set created');
        return redirect()->action('SetController@index');
    }

    public function create()
    {
        return view('set_create');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
               'name'        => 'required|max:255',
            'number' => 'required|max:255'
        ]);

        $set = Set::find($id);

        $uploadpath = 'uploads';
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $filename = sha1(rand(1, 100000).time()) . '.' . $request->file('file')->guessExtension();
                $request->file('file')->move($uploadpath, $filename);
                $set->filename = $filename;
            }
        }

        $set->name = $request->name;
        $set->number = $request->number;
        $set->save();

        $request->session()->flash('msg', 'Set saved');
        return redirect()->action('SetController@index');
    }

    public function destroy($id, Request $request)
    {
        $set = Set::find($id);
        $set->delete();

        $request->session()->flash('msg', 'Set deleted');
        return redirect()->action('SetController@index');
    }

    public function show($id)
    {
        $set = Set::findOrFail($id);
        $minifigs = $set->minifigs;

        return view('set_show')->with('set', $set)->with('minifigs', $minifigs);
    }

    public function edit($id)
    {
        $set = Set::find($id);
        return view('set_edit')->with('set', $set);
    }
}
