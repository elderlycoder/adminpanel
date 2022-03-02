<?php

namespace App\Models\Goroda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Content\ArticleCategory;

class Smolensk extends Model
{ 
    protected $table = "ok_content"; //привязываем таблицу к модели
    protected $connection = 'mysql_smol';
    //protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $fillable = ['title', 'alias', 'note', 'catid', 'fulltext', 'metadata', 'metadesc', 'metakey', 'state'];
   public $timestamps = false;

}


































