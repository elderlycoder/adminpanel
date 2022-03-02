<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\Article;

class ArticleCategory extends Model
{
    protected $table = 'ok_categories'; //привязываем таблицу к модели
    protected $connection = 'mysql_kos';
   protected $primaryKey='id'; //название ключего поля отличается от стандартного 'id' поэтому указываем его специально
 //метод который связывает product с price один к одному
   protected $fillable = ['parent_id', 'path', 'title', 'alias', 'note', 'published'];
   public $timestamps = false;

   public function articles(){
      return $this->hasMany(Article::class, 'catid');
   }
}
