<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\ArticleCategory; // mysql_kos     'ok_categories'
use App\Models\Goroda;
use App\Models\Content\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::withCount('articles')->where('note', 'new')->orderBy('parent_id', 'DESC')->get();   
        
        return view('content.categories.index', compact('categories'));
    }

    public function show(ArticleCategory $category){
       // Сюда добавить проверку на существование родительской категории, за образец взять у статей
        return view('content.categories.show', compact('category'));
    }

    public function copy(ArticleCategory $category)    
    {   $this->addCategory($category);
        $this->addAsset($category->asset);
        $category->note = '';
        $category->save();
       
        return redirect()->route('content.categories.index')->with('message', 'Категория добавлена');
    }

   
    public function addCategory($data){
        $goroda = Goroda::all();        
        $array = $data->toArray();
        $array['checked_out_time'] = '2042-02-09 13:15:34';
        foreach($goroda as $gorod ){
            $model = 'App\Models\Goroda\\'.$gorod->model.'\\Categories';
           
            $category = $model::updateOrCreate($array);            
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
 