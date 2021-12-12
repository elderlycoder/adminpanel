@extends ('admin.layout')

@section ('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Редактировать категорию
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Меняем категорию</h3>
        @include ('admin.errors')
      </div>
      <div class="box-body">
        {{Form::open(['route'=>['categories.update', $subcategory->id], 'method'=>'put'])}}
        <div class="col-md-6">
          <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$subcategory->title}}">
          </div>
          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$subcategory->slug}}">
          </div>
        
        <div class="form-group">
          {{Form::submit('Изменить')}}
        </div>
        </div>
        {{Form::close()}}
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      
      </div>
      <!-- /.box-footer-->


    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection