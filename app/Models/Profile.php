<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['title', 'slug', 'location'];

    public function images(){
        return $this->hasManyTrough(Image::class);// user имеет много картинок
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function add($fields){ //$field - это массив где находятся значения параметров из массива $fillable
        $profile = new static; //создаём экземпляр класса
        $profile->fill($fields);	 //заполняем нужными данными
        $profile->save();
        return $profile;
    }

    public function edit($fields)
    {
        $this->fill($fields); 
        $this->save();
    }

    // public function setAdres($id){
    //     if($id == null){return;}
    //     $this->category_id = $id;
    //     $this->save();
    // }
}
