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
    
    <h2>Подкатегории</h2>
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Название</th>
       <th>Slug</th>
       <th>Metakey</th>
       
       <th>Действия</th>
      </tr>
     </thead>
     <tbody>
      @foreach($categories as $category)
      <tr>
      <td>{{$category->virtuemart_category_id}}</td>
       <td><a href="{{route('admin.vm.categories.show', $category->virtuemart_category_id )}}">{{$category->category_name}}</a></td>
      
       <td>{{$category->slug}}</td>
       <td>{{$category->metakey}}</td>
       
       
       <td><a href="#" class="fa fa-pencil"></a></td>
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