<?php

namespace App\Models\VM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmCategoryCategories extends Model
{   protected $table = "ok_virtuemart_category_categories"; //привязываем таблицу к модели
   protected $connection = 'mysql_kos';
   //protected $primaryKey='virtuemart_category_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
//метод который связывает product с price
   public $timestamps = false;//запрещаем искать в таблице метки времени
   protected $guarded = [];


   public function vmCategoryru(){
      return $this->belongsTo(VmCategoryru::class, 'category_child_id', 'virtuemart_category_id');
   }
}
