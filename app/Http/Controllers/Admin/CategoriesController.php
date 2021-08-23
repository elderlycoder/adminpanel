<?php

namespace App\Http\Controllers\Admin;
use App\Models\VmCategory;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.categories.index', compact('categories', 'subcategories'));
    }

    public function create()// просто возвращаем вид с формой для занесения данных
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::with('subcategories')->findOrFail( $id );
    return view('admin.categories.show', ['category' => $category ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function copyCategories(){
        
        $vmcategory = VmCategory::where('parent_id', '>', 0)->get();
        //dd($vmcategory);
        $category = Category::pluck('vm_id')->all();
        //$subcategory = 
        
        foreach($vmcategory as $data){
            //если внутри массива $category нет элемента с совпадающего с $data->virtuemart_category_id
            if(!in_array($data->virtuemart_category_id, $category)){
            Category::insert (['title' => $data->category_name, 'slug'=>$data->slug, 'vm_id'=>$data->virtuemart_category_id]);
        }}
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }
}
