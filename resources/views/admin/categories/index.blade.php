@extends('layout')
@section('page-title', 'Вывод категорий')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Выводим категории и подкатегории
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Категории Админ панели</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="#" class="btn btn-success">ТО</a>
                <a href="#" class="btn btn-success">Ходовая</a>
                <a href="#" class="btn btn-success">Рулевое</a>
              </div>
              <h2>Подкатегории</h2>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Slug</th>
                  <th>Подкатегории</th>
                  <th>VM ID</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subcategories as $subcategory)
                <tr>
                  <td>{{$subcategory->id}}</td>
                  <td><a href="{{route('subcategories.show', $subcategory->id)}}">{{$subcategory->title}}</a></td>
                  <td>{{$subcategory->slug}}</td>
                  <td>1</td>
                  <td>{{$subcategory->vm_id}}</td>
                   
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
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->
