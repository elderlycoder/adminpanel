@extends('layouts.app')

@section('page-title', 'Все услуги')

@section('content')
   <h1>Товары из категории</h1>
  
     
      <div>
     <table>
        @foreach($products as $product)
        <tr>
           <td>{{$product->product_name}}</td>
           <td>{{$product->price->product_price}}</td>
           <td>{{$product->product_sku}}</td>
           <td>{{$product->product_mpn}}</td>
       </tr>
       @endforeach
     </table>
  </div>
   
@endsection 