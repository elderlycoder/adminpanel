<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'slug'];

    public function profile(){
        return $this->hasOne(Profile::class);// user имеет один профиль
    }
    public function images(){
        return $this->hasMany(Image::class);// user имеет много картинок
    }

    public static function add($fields){
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields){
        $this->fill($fields); //name,email

        $this->save();
    }
    public function getProfileId(){
        
        return $this->profile->id;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generatePassword($password){
        if($password != null){
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function isAdmin() {
        return $this->where('is_admin', '1')->exists();
     }


}
