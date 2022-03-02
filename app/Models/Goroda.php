<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Goroda extends Model
{
    protected $table = "goroda"; //привязываем таблицу к модели
    protected $connection = 'mysql';
    //protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   //protected $fillable = ['title', 'alias', 'note', 'catid', 'fulltext', 'metadata', 'metadesc', 'metakey', 'state'];
   public $timestamps = false;

   
}


































