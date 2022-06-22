<?php
namespace App\Http\Controllers;

use App\Models\Product\VmCategory;
use Illuminate\Http\Request;
use App\Models\Product\VMProductru; 
use App\Models\Product\VMProduct; 

use App\Models\Product\VmPrice;


class ProductController extends Controller{

   public function index(){
      $categories = VmCategory::with('productsru')->where('usluga', '<>', 'usluga')->where('usluga', '<>', 'fary')->get();
     
      $products = VMProductru::whereHas('vmcategory', function($query){
         $query->where('usluga', '<>', 'fary')->where('usluga', '<>', 'usluga');
      
      })->with('price')->paginate(20);      
      
      return view('products', compact( 'categories', 'products'));
   }

   public function getProduct($id){
      $category = VmCategory::find($id);
      $products = $category->vmproducts;
      
      return view('productscategory', compact('products'));
   }
      public function getProductCategory($id){
         $category = VmCategory::find($id);
         // $products = $category->vmproducts;
         //$id=$id;
         $products = $category->vmproducts()->chunk(20, function ($products){
            foreach ($products as $item){
               $content = file_get_contents('http://api.favorit-parts.ru/hs/hsprice/?key=84CF3558-FF69-11E7-8130-0050568E1762&number='.$item->product_sku.'&brand='.$item->product_mpn.'&analogues=off') ;
               $json = json_decode($content);
               $new_price = (round($json->goods[0]->price));
       
               VmPrice::where('virtuemart_product_id', $item->virtuemart_product_id)
                      ->update(['product_price'=>$new_price]);
                      
               
                }
         });
        
         //dd('ok');
         return view('productscategory', compact('products'));
      }
   
}