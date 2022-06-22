<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Content\ArticleCategory;

class Asset extends Model
{ 
    protected $table = "ok_assets"; //привязываем таблицу к модели
    protected $connection = 'mysql_kos';
    //protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $guarded = [] ;
   public $timestamps = false;


  

}


































