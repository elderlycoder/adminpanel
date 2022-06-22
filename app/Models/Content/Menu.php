<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\ArticleCategory;

class Menu extends Model
{
    protected $table = "ok_menu"; //привязываем таблицу к модели
    protected $connection = 'mysql_kos';
    //protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $guarded = [];
   public $timestamps = false;

   public function types(){
      return $this->belongsTo(MenuType::class, 'menutype', 'menutype'); //второй параметр внешний ключ в таблице подчинённой модели
   // третий парметр ключ первичный ключ родительской модели (ArticleCategory)
   } 

   // public function asset(){
   //    return $this->belongsTo(Asset::class, 'asset_id');
   // }
}
