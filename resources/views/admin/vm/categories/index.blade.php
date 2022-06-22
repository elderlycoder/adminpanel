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
     @foreach($vmcategories as $category)
     <a href="#" class="btn btn-success">{{$category->vmCategoryru->category_name.' ('.$category->vmCategoryru->virtuemart_category_id.')'}}</a>
     @endforeach
    </div>
    <h2>Подкатегории</h2>
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Название</th>
       <th>Slug</th>
       
       <th>Действия</th>
      </tr>
     </thead>
     <tbody>
     
      </tbody>
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