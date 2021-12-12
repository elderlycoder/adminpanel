@extends('admin.layout')
@section('page-title', 'Вывод категорий')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>Выводим категории и подкатегории</h1>
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
    <h2 class="box-title">Категории</h2>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
    <div class="form-group">
     @foreach($categories as $category)
     <a href="{{route('categories.show', $category->id)}}" class="btn btn-success">{{$category->title}}</a>
     @endforeach
    </div>
    <h2>Подкатегории</h2>
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Название</th>
       <th>Slug</th>
       <th>Категория</th>
       <th>VM ID</th>
       <th>Действия</th>
      </tr>
     </thead>
     <tbody>
      @foreach($subcategories as $subcategory)
      <tr>
       <td>{{$subcategory->id}}</td>
       <td><a href="{{route('subcategories.show', $subcategory->vm_id)}}">{{$subcategory->title}}</a></td>
       <td>{{$subcategory->slug}}</td>
       <td>{{$subcategory->getCategoryTitle()}}</td>
       <td>{{$subcategory->vm_id}}</td>
       <td><a href="{{route('categories.edit', $subcategory->vm_id)}}" class="fa fa-pencil"></a></td>

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