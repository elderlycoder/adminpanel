@extends('service.layout')
@section('page-title', 'Информация о сервисе')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>      Информация о сервисе   </h1>
   </section>

   <!-- Main content -->
   <section class="content">

   <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
      <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-success">Изменить</a>
      </div>
      <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
                
                  
               <tr>
                  <td>Адрес: </td>
                  <td>{{$profile->adres}}</td>
               </tr>
               <tr>
                  <td>Описание: </td>
                  <td>{{$profile->description}}</td>
               </tr>
               <tr>
                  <td>Метро: </td>
                  <td>{{$profile->metro}}</td>
               </tr>
               
              </table>
      </div>
      <H2>Картинки сервиса</H2>
      @foreach ($images as $image)
      <div class="form-group">
            <img src="{{$image->getImage()}}" alt="" class="img-responsive" width="200">
         </div>
      @endforeach
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