<?php

namespace App\Http\Controllers\Admin;
use App\Models\VmCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function copyCategories(){
        
        $vmcategory = VmCategory::where('metakey', 'usluga')->get();
        $category = Category::pluck('vm_id')->all();
        
        foreach($vmcategory as $data){
            if(!in_array($data->virtuemart_category_id, $category)){
            Category::insert (['title' => $data->category_name, 'slug'=>$data->slug, 'vm_id'=>$data->virtuemart_category_id]);
        }}
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }
}
