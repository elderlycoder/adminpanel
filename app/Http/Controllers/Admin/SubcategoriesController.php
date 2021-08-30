<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subcategory;
use App\Models\VmCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategories.index', ['subcategories' => $subcategories]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    // public function copyCategories(){
        
    //     $vmcategory = VmCategory::where('parent_id', '>', 0)->get();
    //     //dd($vmcategory);
    //     $subcategory = Subcategory::pluck('vm_id')->all(); 
        
    //     foreach($vmcategory as $data){
    //         //если внутри массива $category нет элемента с совпадающего с $data->virtuemart_category_id
    //         if(!in_array($data->virtuemart_category_id, $subcategory)){
    //         Subcategory::insert (['title' => $data->category_name, 'slug'=>$data->slug, 'vm_id'=>$data->virtuemart_category_id, 'category_id'=>$data->parent_id]);
    //     }}
    //     $subcategories = Subcategory::all();
    //     return view('admin.categories.index', ['subcategories' => $subcategories]);
    // }
}
