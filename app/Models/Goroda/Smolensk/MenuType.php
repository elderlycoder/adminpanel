<?php

namespace App\Models\Goroda\Smolensk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MenuType extends Model
{
    protected $table = 'ok_menu_types'; //привязываем таблицу к модели
    protected $connection = 'mysql_smol';
   //protected $primaryKey='menutype'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
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
