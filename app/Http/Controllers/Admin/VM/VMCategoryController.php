<?php

namespace App\Http\Controllers\Admin\VM;

use App\Models\VM\VmCategoryru;
use App\Models\VM\VmCategoryCategories;
use App\Models\Goroda;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use App\Models\Category;
// use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VMCategoryController extends Controller
{
    public function index()
    {
        //$vmsubcategories = VmCategory::where('parent_id', '>', 0)->orderBy('parent_id')->get();
        $vmcategories = VmCategoryCategories::with('vmCategoryru')->where('category_parent_id', 168)->get();
            echo $vmcategories[0]->vmCategoryru;
            // foreach($vmcategories as $el){
            //     echo $el->vmCategoryru;
            // }
        return view('admin.vm.categories.index', compact('vmcategories'));
    }

    public function new() // просто возвращаем вид с формой для занесения данных
    {
        $categories = VmCategoryru::select()->where('metakey', 'new')->orWhere('metakey', 'update')->get();
        return view('admin.vm.categories.new', compact('categories'));
    }
    public function show(VmCategoryru $category)
    {
        //dd($category);
        return view('admin.vm.categories.show', compact('category'));
    }

    public function copy(VmCategoryru $category)
    {//dd($category->vmCategoryCategories);
        $array = $category->toArray();
        $arrayCategoryCategories = $category->vmCategoryCategories->toArray(); 
        $arrayCategories = $category->vmCategories->toArray(); 

        $goroda = Goroda::all();
        foreach ($goroda as $gorod) {
            $model = 'App\Models\Goroda\\' . $gorod->model . '\\VmCategory';
            $modelCategoryCategories = 'App\Models\Goroda\\' . $gorod->model . '\\VmCategoryCategories';
            $modelCategories = 'App\Models\Goroda\\' . $gorod->model . '\\VmCategories';
            //dd($modelCategories);
            // если нет такой категории вернёт null
            $vmcategory = $model::find($category->virtuemart_category_id);
            if(empty($vmcategory)){                
                $model::updateOrCreate($array);                
                $modelCategoryCategories::updateOrCreate($arrayCategoryCategories);
                $arrayCategories['locked_on'] = '2042-02-09 13:15:34';                
                $modelCategories::updateOrCreate($arrayCategories);                
            } else {
                $vmcategory->updateOrCreate($array);
            }
        }
        $category->metakey = 'Добавлено';
        $category->save();
        return redirect()->route('admin.vm.categories.new');
    }
    // public function store(Request $request)
    // {
    //     Category::create($request->all());
    //     return redirect()->route('categories.index');
    // }

    public function edit($id)


    {
        $subcategory = Subcategory::find($id);
        return view('admin.categories.edit', compact('subcategory'));
    }

    public function update(Request $request, $id)
    {
        $category = Subcategory::find($id);
        $category->update($request->all());
        $vmcategory = VmCategoryru::find($id); //where('virtuemart_category_id', 'id')->first();
        //dd($vmcategory);
        $vmcategory->slug = $request->slug;
        $vmcategory->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        //
    }

    public function copyCategories()
    {

        $vmsubcategory = VmCategoryru::where('parent_id', '>', 0)->get();
        $vmcategory = VmCategoryru::where('parent_id', 0)->get();
        //dd($vmcategory);
        $category = Category::pluck('vm_id')->all();
        $subcategory = Subcategory::pluck('vm_id')->all();


        foreach ($vmcategory as $data) {
            //если внутри массива $category нет элемента с совпадающего с $data->virtuemart_category_id
            if (!in_array($data->virtuemart_category_id, $category)) {
                Category::insert([
                    'id' => $data->virtuemart_category_id,
                    'title' => $data->category_name,
                    'slug' => $data->slug,
                    'vm_id' => $data->virtuemart_category_id
                ]);
            }
        }

        foreach ($vmsubcategory as $data) {
            //если внутри массива $category нет элемента с совпадающего с $data->virtuemart_category_id
            if (!in_array($data->virtuemart_category_id, $subcategory)) {
                Subcategory::insert([
                    'id' => $data->virtuemart_category_id,
                    'title' => $data->category_name,
                    'slug' => $data->slug,
                    'vm_id' => $data->virtuemart_category_id,
                    'category_id' => $data->parent_id
                ]);
            } else {
                Subcategory::where('id', $data->virtuemart_category_id)->update(
                    [
                        'title' => $data->category_name,
                        'slug' => $data->slug,
                        'vm_id' => $data->virtuemart_category_id
                    ]
                );
            }
        }
        // $categories = Category::all();
        // return view('admin.categories.index', ['categories' => $categories]);
        return redirect()->route('categories.index');
    }
}
