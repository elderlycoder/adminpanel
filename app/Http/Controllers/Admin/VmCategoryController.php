<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VmCategory;

class VmCategoryController extends Controller
{
    public function index(){
        $category = VmCategory::where('parent_id', '>=', 0)->get();
        return view('admin.vmcategories', ['category' => $category]);
        
    }
}
