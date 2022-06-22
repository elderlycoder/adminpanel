@extends('layouts.admin')
@section('page-title', 'Вывод категорий материалов')
@section('content')

 <section class="content">

  <!-- Default box -->
  <div class="box">
   <div class="box-header">
    <h2 class="box-title">Обновлённые и новые пункты меню</h2>
   </div>
   @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
   <!-- /.box-header -->
   <div class="box-body">   
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>menutype</th>
       <th>title</th>
       <th>alias</th>       
       <th>note</th>
       <th>path</th>
       <th>link</th>
       <th>type</th>
      </tr>
     </thead>
     <tbody>
      @foreach($menus as $menu)
      <tr>
       <td>{{$menu->id}}</td>
       <td>{{$menu->menutype}}</td>
       <td><a href="{{route('content.menu.show', $menu->id)}}">{{$menu->title}}</a></td>
       <td>{{$menu->alias}}</td>            
       <td>{{$menu->note}}</td>
       <td>{{$menu->path}}</td>
       <td>{{$menu->link}}</td>  
       <td>{{$menu->type}}</td>
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
