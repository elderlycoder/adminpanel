@extends('layouts.admin')
@section('page-title', 'Вывод категорий материалов')
@section('content')

 <section class="content">

  <!-- Default box -->
  <div class="box">
   <div class="box-header">
    <h2 class="box-title">Категории материалов</h2>
   </div>
   <!-- /.box-header -->
   <div class="box-body">   
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>title</th>
       <th>alias</th>
       <th>path</th>
       <th>parent_id</th>
       <th>note</th>
       <th>published</th>
      </tr>
     </thead>
     <tbody>
      @foreach($categories as $category)
      <tr>
       <td>{{$category->id}}</td>
       <td><a href="{{route('content.categories.show', $category->id)}}">{{$category->title}}</a></td>
       <td>{{$category->alias}}</td>
       <td>{{$category->path}}</td>
       <td>{{$category->parent_id}}</td>
       <td>{{$category->articles_count}}</td>
       <td>{{$category->published}}</td>
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