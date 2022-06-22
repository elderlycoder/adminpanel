<?php

namespace App\Models\Goroda\Smolensk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{ 
    protected $table = 'ok_assets'; //привязываем таблицу к модели
    protected $connection = 'mysql_smol';
    //protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $guarded = [] ;
   public $timestamps = false;

   public function categories(){
      return $this->hasOne(Categories::class, 'asset_id', 'id');
   }
   public function content(){
      return $this->hasOne(Content::class, 'asset_id', 'id');
   }

  

}


































