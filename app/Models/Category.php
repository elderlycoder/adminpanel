<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id'];
    public function subcategories(){ //название метода во множественном числе
        return $this->hasMany(Subcategory::class); //hasMany - имеет много
    }
}
