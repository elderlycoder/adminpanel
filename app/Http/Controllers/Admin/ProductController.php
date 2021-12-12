<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use App\Models\Product;
use App\Models\Product\VMProductru;
use App\Http\Requests\Admin\Product\StoreRequest;

class ProductController extends Controller
{
    public function index($id)
    {
        // $products = Product::all();        
        // return $id;
    }
    // public function productsFromCategory($id)
    // {
    //     $products = Product::all();        
    //     return $id;
    // }

    public function create()
    {
        //
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = VMProductru::find($id);
        return view('admin.products.edit', compact('product'));
    }

    
    public function update(StoreRequest $request, $id){
        $data = $request->validated();
        $product = VMProductru::find($id);
        
        $product->product_name = $data['title'];
        $product->save();
        //обновляем данные в связанной модели
        $product->price()->update( ['product_price'=>$data['price']]);        
        return redirect()->back();       
    }

    public function destroy($id)
    {
        //
    }
}
