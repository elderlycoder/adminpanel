<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// vm*_product_id | vm*_vendor_id | product_parent_id | product_sku | product_gtin | product_mpn |
class VMProduct extends Model
{   protected $table = "ok_virtuemart_products"; //привязываем таблицу к модели
   protected $connection = 'mysql2';
   protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
//метод который связывает product с price один к одному
   public function price(){
      return $this->hasOne(VmPrice::class, 'virtuemart_product_id', 'virtuemart_product_id');
   }
   public function subcategories(){
      return $this->belongsToMany(Subcategory::class, 'ok_virtuemart_product_categories','virtuemart_product_id', 'virtuemart_category_id');
   }
   public function vmproductru(){
      return $this->hasOne(VMProductru::class, 'virtuemart_product_id', 'virtuemart_product_id');
   }

   public function vmcategory(){
      return $this->belongsToMany(VmCategory::class, 'ok_virtuemart_product_categories', 'virtuemart_product_id', 'virtuemart_category_id');
   }
}