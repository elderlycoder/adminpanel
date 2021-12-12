<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use App\Models\VmCategory;
use App\Models\VmManufacturer;

use App\Http\Controllers\Controller;
use App\Models\Product\VMProductru;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
    public function show($id){
        $subcategory = Subcategory::findOrFail($id);        
        return view('admin.subcategories.show', compact('subcategory'));
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
