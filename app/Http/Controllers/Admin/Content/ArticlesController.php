<?php

namespace App\Http\Controllers\Admin\Content;
use App\Models\Goroda;
//use App\Models\Goroda\Smolensk;
use App\Models\Content\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function updatedArticlesList()
    {
        $articles = Article::with('category')->where('note', 'update')->get();
        //dd($articles);
        return view('content.articles.updated', compact('articles'));
    }
   
   public function show(Article $article){    
        // ссылка н картинку <img src="/images/tags/bmw/Двигатель_N46.jpg" width="799" height="651" alt="Двигатель BMW N46" class="">
        $regex	= '#<\s?img\s+src="images\/(.*?)".*>#i';
    preg_match_all($regex, $article->introtext, $matches, PREG_SET_ORDER);
    foreach($matches as $match){
        
       $adress = 'https://img.okeyavto.ru/images/'.$match[1];
       
       $article->introtext = str_ireplace('images/'.$match[1], $adress, $article->introtext);
    
   }
   return view('content.articles.show', compact('article'));
}

   public function send(Request $request, Article $article){
      // ссылка н картинку <img src="/images/tags/bmw/Двигатель_N46.jpg" width="799" height="651" alt="Двигатель BMW N46" class="">

    if(!empty($request->introtext)) {
        $introtext = $request->introtext;       
    }    

    $fulltext = '';
    if(!empty($request->fulltext)) {
        $fulltext = $request->fulltext;
    }  
    if(!empty($request->metadesc)) {
        $metadesc = $request->metadesc;
    }  
    $metakey = '';
    if(!empty($request->metakey)) {
        $metakey = $request->metakey;
    }  
    if(!empty($request->metadata)) {
        $metadata = $request->metadata;
    }  

    $goroda = Goroda::all();
    foreach ($goroda as $gorod){
        
        $introtext=str_replace("Костроме", $gorod->two, $introtext);
        $fulltext=str_replace("Костроме", $gorod->two, $fulltext);
        $metadesc=str_replace("Костроме", $gorod->two, $metadesc);
        $metakey=str_replace("Костроме", $gorod->two, $metakey);
        $metadata=str_replace("Костроме", $gorod->two, $metadata);
        $model = 'App\Models\Goroda\\'.$gorod->model;
        //dd($model);
        $article = $model::find($article['id']);
        $article->introtext = $introtext;
        $article->fulltext = $fulltext;
        $article->metadesc = $metadesc;
        $article->metakey = $metakey;
        $article->metadata = $metadata;
        $article->save();
    }
    return redirect()->route('content.articles.updated'); 
   }

    
}
 