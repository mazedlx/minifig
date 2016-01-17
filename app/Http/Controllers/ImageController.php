<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $minifig = $image->minifig;
        $image->delete();

        Session::flash('msg', 'Successfully deleted');
        return redirect()->action('MinifigController@show', ['id' => $minifig->id]);
    }
}
