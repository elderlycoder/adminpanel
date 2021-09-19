<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Image;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(){
        //$id = auth()->user()->id;
        //dd($id);
        //$profile = Profile::find($id);
        //dd($profile);

        return view('service.index');
    }

    public function image(){
        return view('service.image');
    }
    public function addImage(Request $request){

        $this->validate($request, [
            'image'=>'nullable|image',
        ]);
        $folder = auth()->user()->name;
        $file =  $request->file('image');
        $filename = Str::random(10) . '.' . $file->extension();
        //dd($name);
        $file->storeAs($folder,$filename, 'my_disk');

// из формы мы получаем только одно поле поэтому массового присвоения не нужно делать
        $image = new Image;
        $image->user_id = auth()->user()->id;
        $image->name = $filename;
        $image->title = $file->getClientOriginalName();
        $image->is_profile = auth()->user()->profile->id;
//        $image->uploadImage($request->file('image'));
        $image->save();
        dd('ok');
        return redirect()->route('image');
    }



}
