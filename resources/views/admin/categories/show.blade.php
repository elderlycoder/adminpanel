@extends('layouts.admin')
@section('page-title', 'Вывод категории - '.$category->title)
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>
      {{$category->title}}
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
            <h3 class="box-title">Описание категории</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <h3>Список подкатегорий</h3>
            @if($category->subcategories->count())
            <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
               <th>ID</th>
               <th>Название</th>
               <th>VM ID</th>
               </tr>
               </thead>
               <tbody>
               @foreach($category->subcategories as $subcategory)
               <tr>
               <td>{{$subcategory->id}}</td>
               <td>{{$subcategory->title}}</td>
               <td>{{$subcategory->vm_id}}</td>
                  
               </tr>
               @endforeach
               
               </tfoot>
            </table>
            @endif
         </div>
         <!-- /.box-body -->
         </div>
   <!-- /.box -->

   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection