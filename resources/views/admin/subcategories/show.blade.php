@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h2 class="box-title">Подкатегория - {{$subcategory->title}}</h2>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <p>Верхняя категория - {{$subcategory->category->title}} ({{$subcategory->vm_id}})</p>


        <h2>Товары</h2>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Название</th>
              <th>Цена</th>
              <th>Производитель</th>
              <th>Категория</th>

              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subcategory->productsru as $product)
            <tr>
              <td>{{$product->virtuemart_product_id}}</td>
              <td><a href="{{route('products.edit', $product->virtuemart_product_id)}}">{{$product->product_name}}</a></td>
              <td>{{$product->price->product_price}}</td>
              <td>{{$product->vmmanufacturers()->first()->mf_name}}</td>         
              <td>{{$subcategory->vm_id}}</td>
              <td><a href="#"></a></td>

            </tr>
            @endforeach

            </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection