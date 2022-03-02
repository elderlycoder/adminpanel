@extends('layouts.admin')
@section('page-title', 'Вывод категорий')
@section('content')



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


@endsection
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->