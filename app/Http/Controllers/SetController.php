<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SetRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Set;

class SetController extends Controller
{
    protected $uploadpath = 'uploads';

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update']]);
    }
    public function index()
    {
        $sets = Set::orderBy('name', 'asc')->get();
        return view('sets')->with('sets', $sets);
    }

    public function create()
    {
        return view('set_create');
    }

    public function store(SetRequest $request)
    {
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $filename = sha1(rand(1, 100000).time()) . '.' . $request->file('file')->guessExtension();
                $request->file('file')->move($this->uploadpath, $filename);
            }
        } else {
            $filename = '';
        }

        $set = Set::create(
            array(
                'name' => $request->name,
                'number' => $request->number,
                'filename' => $filename
            )
        );

        $request->session()->flash('msg', 'Set created');
        return redirect()->action('SetController@index');
    }

    public function update($id, SetRequest $request)
    {
        $set = Set::find($id);

        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $filename = sha1(rand(1, 100000).time()) . '.' . $request->file('file')->guessExtension();
                $request->file('file')->move($this->uploadpath, $filename);
                $set->filename = $filename;
            }
        }

        $set->name = $request->name;
        $set->number = $request->number;
        $set->save();

        $request->session()->flash('msg', 'Set saved');
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

    public function destroy($id, Request $request)
    {
        $set = Set::find($id);
        $set->delete();

        $request->session()->flash('msg', 'Set deleted');
        return redirect()->action('SetController@index');
    }
}
