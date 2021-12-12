<?php

namespace App\Http\Controllers\Service;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = Profile::find($id);
        $images = Image::where('user_id', $profile->user_id)
            ->where('is_profile', '>', 0)
            ->get();
        //dd($images);
        return view('service.profile.show', compact('profile', 'images'));
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        $images = Image::where('user_id', $profile->user_id)
            ->where('is_profile', '>', 0)
            ->get();
        //dd($image);
        return view('service.profile.edit', compact('profile', 'images'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'adres' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimetypes:image/jpeg,image/png|max:1000',
        ]);
        $profile = Profile::find($id);
        $profile->adres = ($request->get('adres'));
        $profile->description = ($request->get('description'));
        $profile->metro = ($request->get('metro'));
        $profile->save();
        $image = new Image;
        if($request->file('foto')!=null){
        //$directory = 'img/' . auth()->user()->name;
        $directory = 'img/'. $profile->user->name;
        //dd($directory);
        $file = $request->file('foto');
        $filename = Str::random(10) . '.' . $file->extension();
        $file->storeAs($directory, $filename, 'my_disk');
        

        $image->user_id = auth()->user()->id;
        $image->name = $filename;
        $image->title = $file->getClientOriginalName();
        $image->is_profile = $profile->id;
        $image->save();   
    }
        return redirect()->route('profile.show', $profile->id);
        //return redirect()->back();
    }

    public function imageDestroy($id)
    {
        Image::find($id)->destroyImage();
        return redirect()->back()->with('success', 'Изображение удалено');
    }
 
}
