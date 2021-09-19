@extends('admin.layout')

@section('page-title', 'Все услуги')

@section('content')
<h1>Все услуги</h1>

   <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>Категории Virtuemart</h1>
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
            <h3 class="box-title">Листинг сущности</h3>
            <p> Роут из группы ceo - Route::get('/vmcategories', 'VmCategoryController@index')->name('vmcategories-list'); </p>
            <p>Вид - admin.vmcategories.blade.php  </p>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="form-group">
               <a href="{{route('copy-categories')}}" class="btn btn-success">Скопировать</a>
            </div>
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
               @foreach($category as $el)
               <tr>
               <td>{{ $el->virtuemart_category_id}}</td>
               <td>{{ $el->category_name }}</td>
               <td>{{$el->slug}}</td>
               <td><a href="edit.html" class="fa fa-pencil"></a> <a href="#" class="fa fa-remove"></a></td>
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