<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\Image;
use Illuminate\Support\Str;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

   
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        $password = $data['password'];
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email'=>$data['email']], $data);
        $user->is_admin = $data['is_admin'];
        $user->save();
        return redirect()->route('admin.users.index');  
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }
    public function editProfile($id)
    {
        $profile = Profile::find($id);
        $images = Image::where('user_id', $profile->user_id)
            ->where('is_profile', '>', 0)
            ->get();
        //dd($image);
        return view('admin.users.edit', compact('profile', 'images'));
    }

    
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        //dd($data);
        $password = $data['password'];
        $data['password'] = Hash::make($password);
        $user->update($data);
        $user->is_admin = $data['is_admin'];
        $user->save();
       
        return redirect()->route('admin.users.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
