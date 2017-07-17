<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
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
        return redirect()->action('MinifigsController@show', ['id' => $minifig->id]);
    }
}
