<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\ArticleCategory;

class Article extends Model
{
    protected $table = "ok_content"; //привязываем таблицу к модели
    protected $connection = 'mysql_kos';
    //protected $primaryKey='virtuemart_product_id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $fillable = ['title', 'alias', 'note', 'catid', 'fulltext', 'metadata', 'metadesc', 'metakey', 'state'];
   public $timestamps = false;

   public function category(){
      return $this->belongsTo(ArticleCategory::class, 'catid', 'id'); //второй параметр внешний ключ в таблице текущей модели
   // третий парметр ключ первичный ключ родительской модели (ArticleCategory)
   } 
}
