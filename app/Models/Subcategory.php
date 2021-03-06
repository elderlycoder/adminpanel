<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subcategory extends Model
{
   // use HasFactory;
  protected $fillable = ['title', 'slug', 'category_id', 'vm_id'];
    public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function productsru(){
    return $this->belongsToMany(Product\VMProductru::class, 'ok_virtuemart_product_categories', 'virtuemart_category_id', 'virtuemart_product_id');
 }
  public function products(){
    return $this->belongsToMany(Product\VMProduct::class, 'ok_virtuemart_product_categories', 'virtuemart_category_id', 'virtuemart_product_id');
 }

  public function getCategoryTitle(){
    if($this->category !=null){
        return $this->category->title;
    }

    return 'Нет категории';
}
} 
