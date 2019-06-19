<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Http\Requests;

class AdminMediasController extends Controller
{
    public function index() {
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }


    public function create() {
        return view('admin.media.create');
    }

    public function store(Request $request){

        // from the form(that are in admin.media.create) automatically we're gonna get a POST SuperGlobal called $_FILES with a 
        // key of file
        // So,we're gonna get our requests and it's gonna be type of file request and it;s gonna be named file by default
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
    }

    public function destroy($id) {
       $photo =  Photo::findOrFail($id);
       unlink(\public_path() . $photo->file);
       $photo->delete();
       return redirect('admin/media');
    }
}
