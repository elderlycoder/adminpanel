<?php

namespace App\Http\Controllers\Admin\Content;
use App\Models\Goroda;
use App\Models\Content\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Content\ArticlesController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NewArticlesController extends Controller
{
     // Список новых статей
     public function ArticlesList(){
        $articles = Article::with('category')->where('note', 'new')->orWhere('note', 'update')->get();
        //dd($articles);
        return view('content.articles.list', compact('articles'));
    }

     //Показ отдельной новой статьи
   public function show(Article $article){ 


    $catid = $article->catid;
    $goroda = Goroda::all();
    foreach ($goroda as $gorod){
        $model = 'App\Models\Goroda\\'.$gorod->model.'\\Categories';
        try{
            $model::findOrFail($catid);
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Категория '.$catid.' не найдена')->withInput();
        }   
        //return redirect()->route('content.articles.newlist');     
    }
        return view('content.articles.newshow', compact('article'));
    }
    
        

    public function copy(Article $article)    
    {   $this->addArticle($article);
        //dd($article->asset);
        $this->addAsset($article->asset);       
       //dd('11111');
        return redirect()->route('content.articles.updatedlist');
    }
    public function addArticle($article){
        $goroda = Goroda::all();        
        //array = $data->toArray();
        
        foreach($goroda as $gorod ){
            $model = 'App\Models\Goroda\\'.$gorod->model.'\\Content';
            if($model::find($article['id'])){
               // dd($article['id']);
            $newArticle = $model::find($article['id']);
            //dd($article);
            $newArticle->introtext=str_replace("Костроме", $gorod->two, $article['introtext']);
            $newArticle->fulltext=str_replace("Костроме", $gorod->two, $article['fulltext']);
            $newArticle->metadesc=str_replace("Костроме", $gorod->two, $article['metadesc']);
            $newArticle->metakey=str_replace("Костроме", $gorod->two, $article['metakey']);
            $newArticle->metadata=str_replace("Костроме", $gorod->two, $article['metadata']);
            $newArticle->save();
            dd('успех');
            };
            
            
            $article['checked_out_time'] = '2042-02-09 13:15:34';
            $article['publish_down'] = '2042-02-09 13:15:34';
            $model::updateOrCreate($article);

        }      
    }
      public function addAsset($data){
        $goroda = Goroda::all();         
        $array = $data->toArray();       
        foreach($goroda as $gorod ){
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
}
