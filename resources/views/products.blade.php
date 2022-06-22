@extends('layouts.app')

@section('page-title', 'Все услуги')

@section('content')
   <h1>Все товары</h1>
  
      @foreach($categories as $category)
         
            <a href="{{route('productscategory', $category->virtuemart_category_id)}}" class="button button-primary"><span>{{ $category->category_name }}</span></a>
         
      @endforeach
  <div>
     <table>
        @foreach($products as $product)
        <tr>
           <td>{{$product->product_name}}</td>
           <td>{{round($product->price->product_price)}}</td>
       </tr>
       @endforeach
     </table>
  </div>
   
@endsection 