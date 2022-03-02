<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\ArticleCategory;
use App\Models\Content\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::withCount('articles')->orderBy('parent_id', 'DESC')->get();
        
        //$categories->values()->paginate(20)->get();
        
        return view('content.categories.index', compact('categories'));
    }
    public function show(ArticleCategory $category)
    {
        //$articles = Article::all()->where('catid', $category);        
        //$category = DB::table('ok_categories')->where('id', $id)->get();        
        //dd($articles);
        return view('content.categories.show', compact('category'));
    }

   
}
 