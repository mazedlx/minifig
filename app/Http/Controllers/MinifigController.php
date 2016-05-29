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

class MinifigController extends Controller
{
    /**
     * The directory where uploaded files should be stored (under public)
     * @var string
     */
    protected $uploadpath = 'uploads';

    /**
     * Class constructor. Load the auth middleware for given routes
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update']]);
    }

    /**
     * Return the index view
     * @access public
     */
    public function index()
    {
        $minifigs = Minifig::orderBy('name', 'asc')->paginate(10);

        return view('minifigs')
            ->with('minifigs', $minifigs);
    }

    /**
     * Show the form for creating a new minifig
     * @access public
     */
    public function create()
    {
        return view('minifig_create')
            ->with('sets_id', Set::orderBy('name', 'asc')->pluck('name', 'id'));
    }

    /**
     * Store a new minifig
     * @access public
     * @param  MinifigRequest $request
     */
    public function store(MinifigRequest $request)
    {
        $minifig = Minifig::create(
            [
                'name' => $request->name,
                'set_id' => $request->set_id
            ]
        );
        $id = $minifig->id;

        if ($request->hasFile('files')) {
            if ($request->file('files')) {
                foreach ($request->file('files') as $file) {
                    $filename = sha1(rand(1, 100000).time()) . '.' . $file->guessExtension();
                    $file->move($this->uploadpath, $filename);
                    Image::create(
                        [
                            'minifig_id' => $id,
                            'filename' => $filename
                        ]
                    );
                }
            }
        }

        $request->session()->flash('msg', 'Minifig created');
        return redirect()->action('MinifigController@index');
    }

    /**
     * Update a minifig
     * @access public
     * @param  int $id
     * @param  MinifigRequest $request
     */
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
                        [
                            'minifig_id' => $id,
                            'filename' => $filename
                        ]
                    );
                }
            }
        }

        $request->session()->flash('msg', 'Minifig saved');
        return redirect()->action('MinifigController@index');
    }

    /**
     * Delete a minifig
     * @access public
     * @param  int $id
     * @param  Request $request
     */
    public function destroy($id, Request $request)
    {
        $minifig = Minifig::find($id);
        $minifig->delete();

        $request->session()->flash('msg', 'Minifig deleted');
        return redirect()->action('MinifigController@index');
    }

    /**
     * Show a minifig with given $id
     * @access public
     * @param  int $id
     */
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

    /**
     * Show the form for editing a minifig
     * @access public
     * @param  int $id
     */
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
