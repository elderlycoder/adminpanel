<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmCategory;

class VmCategoryController extends Controller
{
    public function index(){
        $category = VmCategory::where('metakey', '=', 'usluga')->get();
        return view('vmcategories', ['category' => $category]);
    }
}
