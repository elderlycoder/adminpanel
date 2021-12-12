<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class VmManufacturer extends Model
{   protected $table = "ok_virtuemart_manufacturers_ru_ru"; //привязываем таблицу к модели
   protected $connection = 'mysql2';
   protected $primaryKey='virtuemart_manufacturer_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
//метод который связывает product с price один к одному

   public function vmproducts(){
      return $this->belongsToMany(Product\VMProductru::class, 'ok_virtuemart_product_manufacturers', 'virtuemart_manufacturer_id', 'virtuemart_product_id');
   }

}