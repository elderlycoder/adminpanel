<?php

namespace App\Http\Controllers\Admin\Content;
use App\Models\Goroda;
//use App\Models\Goroda\Smolensk;
use App\Models\Content\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticlesController extends Controller
{   // Список обновлённых и  новых статей
    public function articlesList(){
        $articles = Article::with('category')->where('note', 'new')->orWhere('note', 'update')->get();
        //dd($articles);
        return view('content.articles.index', compact('articles'));
    }
   //Показ отдельной обновлённой статьи 
   public function showArticle(Article $article){ 
    $catid = $article->catid;
    $goroda = Goroda::all();
    //dd($catid);
    foreach ($goroda as $gorod){
     $model = 'App\Models\Goroda\\'.$gorod->model.'\\Categories'; 
     // проверка есть или нет категория с таким id в моделях городов    
        try{
            $model::findOrFail($catid);
        } catch (ModelNotFoundException $exception) {
         
            return back()->withError('Категория '.$catid.' не найдена в модели  '. $model)->withInput();              
        }            
    }
    $this->changeImageURL($article); // смена адреса картинки сделана чтобы убедиться, что картинка уже скопирвана img.okeyavto.ru
    return view('content.articles.show', compact('article'));       
       
    }

   public function send(Article $article){
        $this->changeImageURL($article);
        $array = $article->toArray();
        $array['checked_out_time'] = '2042-02-09 13:15:34';
        $array['publish_down'] = '2042-02-09 13:15:34';
        $goroda = Goroda::all();
        foreach($goroda as $gorod ){
            $model = 'App\Models\Goroda\\'.$gorod->model.'\\Content';
            if(empty($model::find($article['id']))){
               
                $model::updateOrCreate($array);
                $this->renameCityArticle($gorod, $article, $model);
                $this->addAsset($gorod, $article->asset);
                return redirect()->route('content.articles.index')->with('message', 'Материал '. $article->title.' добавлен');
            } else {
                $this->renameCityArticle($gorod, $article, $model);
            }       
        return redirect()->route('content.articles.index')->with('message', 'Материал '. $article->title.' обновлен'); 
       }
   }
   public function checkCategory($article){
       $catid = $article->catid;
       $goroda = Goroda::all();
       //dd($catid);
       foreach ($goroda as $gorod){
        $model = 'App\Models\Goroda\\'.$gorod->model.'\\Categories';
        //$category = $model::find($catid);
        // if(!$model::find($catid)){
        //     $error = 'Категория '.$catid.' не найдена';
        //     dd($error);
        //     return $error;//redirect()->route('content.articles.list');
        // }
           try{
               $model::findOrFail($catid);
           } catch (ModelNotFoundException $exception) {      dd($article->metadesc)      ;
            
               return redirect()->route('content.articles.list');//->withError('Категория '.$catid.' не найдена')->withInput();              
           }    
           
       }
       return view('content.articles.show', compact('article'));
    }

   public function changeImageURL($article){
     // ссылка н картинку <img src="/images/tags/bmw/Двигатель_N46.jpg" width="799" height="651" alt="Двигатель BMW N46" class="">
    $regex	= '#<\s?img\s+src="images\/(.*?)".*>#i';
    if(!empty($article->introtext)){
        //dd('image');
        preg_match_all($regex, $article->introtext, $matches, PREG_SET_ORDER);
        foreach($matches as $match){        
           $adress = 'https://img.okeyavto.ru/images/'.$match[1];       
           $article->introtext = str_ireplace('images/'.$match[1], $adress, $article->introtext);    
        }
    }
    if(!empty($article->fulltext)){
        //dd('image');
        preg_match_all($regex, $article->fulltext, $matches, PREG_SET_ORDER);
        foreach($matches as $match){        
           $adress = 'https://img.okeyavto.ru/images/'.$match[1];       
           $article->fulltext = str_ireplace('images/'.$match[1], $adress, $article->fulltext);    
        }
    }
    return $article;
   }
  
   public function renameCityArticle($gorod, $article, $model){
           $newArticle = $model::find($article['id']);
        $newArticle->introtext=str_replace("Костроме", $gorod->two, $article->introtext);//$array['introtext']);
        $newArticle->fulltext=str_replace("Костроме", $gorod->two, $article->fulltext);
        $newArticle->metadesc=str_replace("Костроме", $gorod->two, $article->metadesc);
        $newArticle->metakey=str_replace("Костроме", $gorod->two, $article->metakey);
        $newArticle->metadata=str_replace("Костроме", $gorod->two, $article->metadata);
               
       return $newArticle->save();    
   }

   public function addAsset($gorod, $data){
          
    $array = $data->toArray();       
    
        $model = 'App\Models\Goroda\\'.$gorod->model.'\\Asset';
        $model::updateOrCreate(['id'=>$array['id'],
        'parent_id'=>$array['parent_id'],
        'lft'=>$array['lft'],
        'rgt'=>$array['rgt'],
        'level'=>$array['level'],
        'name'=>$array['name'],
        'title'=>$array['title'],
        'rules'=>$array['rules'],]);            
         
}
    
}
 