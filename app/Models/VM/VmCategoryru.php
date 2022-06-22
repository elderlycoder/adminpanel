<?php

namespace App\Models\VM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmCategoryru extends Model
{
   protected $table = "ok_virtuemart_categories_ru_ru"; //привязываем таблицу к модели
   protected $connection = 'mysql_kos';
   protected $primaryKey = 'virtuemart_category_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
   //метод который связывает product с price
   public $timestamps = false; //запрещаем искать в таблице метки времени
   protected $guarded = [];

   public function price()
   {
      return $this->hasOne(VmPrice::class, 'virtuemart_product_id', 'virtuemart_product_id');
   }

   public function vmCategoryCategories()
   {
      return $this->hasOne(VmCategoryCategories::class, 'category_child_id', 'virtuemart_category_id');
   }
   
   public function vmCategories()
   {
      return $this->hasOne(VmCategories::class, 'virtuemart_category_id', 'virtuemart_category_id');
   }
}
