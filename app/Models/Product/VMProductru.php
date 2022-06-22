<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\VmPrice;
//use App\Models\VmCategory;
use App\Models\VmManufacturer;

class VMProductru extends Model
{   protected $table = "ok_virtuemart_products_ru_ru"; //привязываем таблицу к модели
   protected $connection = 'mysql2';
   protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
//метод который связывает product с price один к одному
  protected $fillable = ['product_name', 'slug', 'virtuemart_product_id'];
  public $timestamps = false;


   public function price(){
      return $this->hasOne(VmPrice::class, 'virtuemart_product_id', 'virtuemart_product_id');
   }

   public function subcategories(){
      return $this->belongsToMany(Subcategory::class, 'ok_virtuemart_product_categories','virtuemart_product_id', 'virtuemart_category_id');
   }

   public function vmproduct(){
      return $this->belongsTo(VMProduct::class, 'virtuemart_product_id', 'virtuemart_product_id');
   }

   public function vmmanufacturers(){
      return $this->belongsToMany(VmManufacturer::class, 'ok_virtuemart_product_manufacturers', 'virtuemart_product_id', 'virtuemart_manufacturer_id');
   }
   public function vmcategory(){
      return $this->belongsToMany(VmCategory::class, 'ok_virtuemart_product_categories', 'virtuemart_product_id', 'virtuemart_category_id');
   }
}