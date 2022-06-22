<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\Article;

class MenuType extends Model
{
    protected $table = 'ok_menu_types'; //привязываем таблицу к модели
    public $connection = 'mysql_kos';
   //protected $primaryKey='id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $guarded = [];
   public $timestamps = false;

   public function menu(){
      return $this->hasMany(Menu::class, 'menutype', 'menutype');
   }

   public function asset(){
      return $this->belongsTo(Asset::class, 'asset_id');
   }
}
