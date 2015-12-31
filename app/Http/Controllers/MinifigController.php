<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\MinifigRequest;
use App\Http\Controllers\Controller;
use App\Minifig;
use App\Set;
use App\Image;

class MinifigController extends Controller
{
    protected $uploadpath = 'uploads';

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update']]);
    }

    public function index()
    {
        $minifigs = Minifig::orderBy('name', 'asc')->get();

        return view('minifigs')
            ->with('minifigs', $minifigs);
    }

    public function create()
    {
        return view('minifig_create')
            ->with('sets_id', Set::orderBy('name', 'asc')->pluck('name', 'id'));
    }

    public function store(MinifigRequest $request)
    {
        $minifig = Minifig::create(
            array(
                'name' => $request->name,
                'set_id' => $request->set_id
            )
        );
        $id = $minifig->id;

        if ($request->hasFile('files')) {
            if ($request->file('files')) {
                foreach ($request->file('files') as $file) {
                    $filename = sha1(rand(1, 100000).time()) . '.' . $file->guessExtension();
                    $file->move($this->uploadpath, $filename);
                    Image::create(
                        array(
                            'minifig_id' => $id,
                            'filename' => $filename
                        )
                    );
                }
            }
        }

        $request->session()->flash('msg', 'Minifig created');
        return redirect()->action('MinifigController@index');
    }

    public function update($id, MinifigRequest $request)
    {
        $minifig = Minifig::find($id);
        $minifig->name = $request->name;
        $minifig->set_id = $request->set_id;
        $minifig->save();

        if ($request->images_to_delete) {
            foreach ($request->images_to_delete as $id_image) {
                $image = Image::find($id_image);
                $image->delete();
            }
        }

        $files = $request->file('files');
        if (count($files) > 0) {
            foreach ($files as $file) {
                if ($file) {
                    $filename = sha1(rand(1, 100000).time()) . '.' . $file->guessExtension();
                    $file->move($this->uploadpath, $filename);
                    Image::create(
                        array(
                            'minifig_id' => $id,
                            'filename' => $filename
                        )
                    );
                }
            }
        }

        $request->session()->flash('msg', 'Minifig saved');
        return redirect()->action('MinifigController@index');
    }

    public function destroy($id, Request $request)
    {
        $minifig = Minifig::find($id);
        $minifig->delete();

        $request->session()->flash('msg', 'Minifig deleted');
        return redirect()->action('MinifigController@index');
    }

    public function show($id)
    {
        $minifig = Minifig::findOrFail($id);
        $set = $minifig->set;
        $images = $minifig->images;

        return view('minifig_show')
            ->with('minifig', $minifig)
            ->with('set', $set)
            ->with('images', $images);
    }

    public function edit($id)
    {
        $minifig = Minifig::findOrFail($id);
        $images = $minifig->images;
        return view('minifig_edit')
            ->with('sets_id', Set::orderBy('name', 'asc')->pluck('name', 'id'))
            ->with('images', $images)
            ->with('minifig', $minifig);
    }
}
