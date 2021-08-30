<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmCategory extends Model
{   protected $table = "ok_virtuemart_categories_ru_ru"; //привязываем таблицу к модели
   protected $connection = 'mysql2';
   protected $primaryKey='virtuemart_category_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
//метод который связывает product с price
   public $timestamps = false;//запрещаем искать в таблице метки времени
   protected $fillable = ['slug', 'virtuemart_category_id'];
   public function price(){
      return $this->hasOne(VmPrice::class, 'virtuemart_product_id', 'virtuemart_product_id');
   }
}
