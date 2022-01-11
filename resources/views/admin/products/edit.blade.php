@extends ('layouts.admin')

@section ('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Редактировать товар
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Меняем товар</h3>
        @include ('admin.errors')
      </div>
      <div class="box-body">
        {{Form::open(['route'=>['products.update', $product->virtuemart_product_id], 'method'=>'put'])}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$product->product_name}}">
          </div>
          <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" class="form-control" id="price" name="price" value="{{$product->price->product_price}}">
          </div>
          <div class="form-group">
            {{Form::submit('Изменить', ['class' => 'btn btn-warning pull-right'])}}
          </div>
        </div>
        {{Form::close()}}  
        
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
       
      </div>
      


    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection