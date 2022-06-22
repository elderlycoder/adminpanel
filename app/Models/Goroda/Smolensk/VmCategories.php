<?php

namespace App\Models\Goroda\Smolensk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmCategories extends Model
{   protected $table = "ok_virtuemart_categories"; //привязываем таблицу к модели
   protected $connection = 'mysql_smol';
   //protected $primaryKey='virtuemart_category_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
//метод который связывает product с price
   public $timestamps = false;//запрещаем искать в таблице метки времени
   protected $guarded = [];
   // public function vmCategory(){
   //    return $this->belongsTo(VmCategory::class, 'category_child_id', 'virtuemart_category_id');
   // }
}
