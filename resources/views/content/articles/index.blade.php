@extends('layouts.admin')
@section('page-title', 'Вывод категорий материалов')
@section('content')

 <section class="content">

  <!-- Default box -->
  <div class="box">
   <div class="box-header">
    <h2 class="box-title">Обновлённые и новые материалы</h2>
   </div>
   @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      @if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
   <!-- /.box-header -->
   <div class="box-body">   
    <table id="example1" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>title</th>
       <th>alias</th>
       <th>catid</th>
       <th>category path</th>
       <th>note</th>
       <th>state</th>
      </tr>
     </thead>
     <tbody>
      @foreach($articles as $article)
      <tr>
       <td>{{$article->id}}</td>
       <td><a href="{{route('content.article.show', $article->id)}}">{{$article->title}}</a></td>
       <td>{{$article->alias}}</td>
       <td>{{$article->catid}}</td>
       <td>{{$article->category->path}}</td>
       <td>{{$article->note}}</td>
       <td>{{$article->state}}</td>
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
