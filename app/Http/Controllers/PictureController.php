<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PictureController extends Controller
{
    public function create(){
     return view ('create_picture');
    }

    public function store(Request $request){
        $file = $request->file('file');
        $name = $request->name;

        $path = time() . '_' .$request->name . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' .$path, file_get_contents($file));

        Picture::create([
            'name' => $name,
            'path' => $path
        ]);

        return Redirect::route('picture.create');
    }

    public function show(Picture $picture){
        $url = Storage::url($picture->path);

        return view ('show_picture', compact('url','picture'));
    }

    public function delete(Picture $picture){
        Storage::delete('public/' . $picture->path);
        $picture->delete();
        return Redirect::route('picture.create');
    }

    public function copy(Picture $picture){
        Storage::copy('public/' .$picture->path, 'copy/' . $picture->path);
        return Redirect::route('picture.create');
    }

    public function move(Picture $picture){
        Storage::move('public/' .$picture->path, 'move/' . $picture->path);
        return Redirect::route('picture.create');
    }
}
