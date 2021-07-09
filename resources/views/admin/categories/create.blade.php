@extends ('admin.layout')

@section ('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить категорию
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      <form method="POST" action="{{route('categories.store')}}">
      @csrf
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем категорию</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Название</label>
              <input type="text" class="form-control" id="title" placeholder="" name="title">
            </div>
            <div class="form-group">
              <label for="slug">Псевдоним</label>
              <input type="text" class="form-control" id="slug" placeholder="" name="slug">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </form>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection