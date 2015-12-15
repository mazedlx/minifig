<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Session;
use DB;
use App\Set;
use App\Http\Controllers\Controller;

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
       		'name' 		=> 'required|max:255',
       		'number'	=> 'required|max:255',
    	]);
		$file = $request->file('file');
    	if($file[0]) {
    		$uploaddir = 'uploads';
    		$filename = sha1(rand(1,100000).time());
    		$file[0]->move($uploaddir, $filename);
    	} else {
    		$filename = '';
    	}

    	$set = Set::create(
    		array(
    			'name' 		=> $request->name,
    			'number' 	=> $request->number,
    			'filename'	=> $filename
    		)
    	);

  		Session::flash('msg', 'Set created'); 
  		return redirect()->action('SetController@index');
	}

	public function create()
	{
		return view('set_create');
	}

	public function update($id, Request $request)
	{
		$this->validate($request, [
       		'name' 		=> 'required|max:255',
            'number' => 'required|max:255'
    	]);
    	
    	$file = $request->file('file');
    	if($file[0]) {
    		$uploaddir = 'uploads';
    		$filename = sha1(rand(1,100000).time());
    		$file[0]->move($uploaddir, $filename);
    	} else {
    		$filename = '';
    	}
    	$set = Set::find($id);
    	$set->name = $request->name;
        $set->number = $request->number;
    	$set->filename = $filename;
    	$set->save();	

    	Session::flash('msg', 'Set saved'); 
  		return redirect()->action('SetController@index');
	}

	public function destroy($id)
	{
		$set = Set::find($id);
        $set->delete();

		Session::flash('msg', 'Successfully deleted');
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