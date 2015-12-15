<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Session;
use DB;

use App\Http\Controllers\Controller;
use App\Minifig;
use App\Set;
use App\Image;

class MinifigController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update']]);
    }
	public function index()
	{
		$minifigs = Minifig::all();

		return view('minifigs')->with('minifigs', $minifigs);
	}   

	public function create()
	{
		$sets = Set::all();
		foreach($sets as $set) {
			$sets_id[$set->id] = $set->name . ' (' . $set->number .')';
		}
		return view('minifig_create')->with('sets_id', $sets_id); //Set::lists('name', 'id'));
	}

	public function store(Request $request) 
	{
		$this->validate($request, [
       		'name' 		=> 'required|max:255',
       		'set_id'	=> 'required'
    	]);
    	$minifig = Minifig::create(
    		array(
    			'name' => $request->name, 
    			'set_id' => $request->set_id
    		)
    	);
    	$id = $minifig->id;

		$files = $request->file('files');
		if(count($files) > 0) {
	   	    $uploaddir = 'uploads';
	 		foreach($files as $file) {
	 			$filename = sha1(rand(1,100000).time());
	        	$file->move($uploaddir, $filename);
	        	Image::create(
	        		array(
	        			'minifig_id' => $id,
	        			'filename' => $filename
	        		)
	        	);
	      	}
	    }
	    
  		Session::flash('msg', 'Minifig created'); 
  		return redirect()->action('MinifigController@index');
	}

	public function update($id, Request $request)
	{
		$this->validate($request, [
       		'name' 		=> 'required|max:255',
       		'set_id'	=> 'required'
    	]);
    	$minifig = Minifig::find($id);
    	$minifig->name = $request->name;
    	$minifig->set_id = $request->set_id;
    	$minifig->save();

		$files = $request->file('files');
		if(count($files) > 0) {
	   	    $uploaddir = 'uploads';
	 		foreach($files as $file) {
	 			$filename = sha1(rand(1,100000).time());
	        	$file->move($uploaddir, $filename);
	        	Image::create(
	        		array(
	        			'minifig_id' => $id,
	        			'filename' => $filename
	        		)
	        	);
	      	}
	    }

    	Session::flash('msg', 'Minifig saved'); 
  		return redirect()->action('MinifigController@index');
	}

	public function destroy($id)
	{
		$minifig = Minifig::find($id);
        $minifig->delete();

		Session::flash('msg', 'Successfully deleted');
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
		return view('minifig_edit')->with('sets_id', Set::lists('name', 'id'))->with('minifig', $minifig);
	}
}