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
   
    public function update(Request $request, $id)
   
    public function destroy($id)
    
}
