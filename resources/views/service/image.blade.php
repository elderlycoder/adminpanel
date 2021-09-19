@extends('service.layout')
@section('page-title', 'Картинки')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>
      Добавить картинку
   </h1>
   </section>

   <!-- Main content -->
   <section class="content">

   <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Главная страница</h3>
      </div>
      <div class="box-body">
      <form method="POST" action="{{route('add-image')}}" enctype="multipart/form-data">
           
           @csrf  
           <div class="box">
                 <div class="box-body">
                    <div class="col-md-6">
                       
                       <div class="form-group">
                          <label for="foto_1">Фото 1</label>
                          <input type="file" class="form-control" name="image" id="foto_1">
                       </div>  
                    
                    </div>
                 </div>
              </div>
              <div class="box-header with-border">
                 <button class="btn btn-success">Сохранить</button>
                </div>
                </form>
           
        
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
         и здесь есть место для какого-нибудь текста
      </div>
      <!-- /.box-footer-->
   </div>
   <!-- /.box -->

   </section>
   <!-- /.content -->
</div>
@endsection