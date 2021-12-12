<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public static function add()
    {
        $image = new static; //создаём экземпляр класса
        //$image->fill($fields); //заполняем нужными данными с помощью массового присвоения
        $image->user_id = 1;
        //$image->name = $name.'_'.Str::random(7);
        $image->save();
        return $image;
    }
    public function uploadImage($image){
        if($image == null){ return; } // если картинки нет, ничего не делаем
        $filename = Str::random(7) . '.' .$image->extension();
        $image->saveAs('img', $filename);
        $this->image = $filename;
        $this->image->user_id = auth()->user();
        $this->save();
    }

    // public function getImage(){
    //     $directory = auth()->user()->name;
    //     return '/img/'.$directory .'/'. $this->name;
    // }
    public function getImage($id){
        $directory = Profile::find($id)->user->name;
        return '/img/'.$directory .'/'. $this->name;
    }

    public function destroyImage(){
        //dd($this->name);
        $directory = auth()->user()->name;
        //dd($directory);
        Storage::disk('my_disk')->delete('img/'.$directory .'/'. $this->name); // удаление файлов, обращаемся к классу Storage и его статическому методу delete, параметр - путь до файла
        $this->delete();// удаляем запись в БД
    }
}
