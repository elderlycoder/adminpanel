@extends('service.layout')
@section('page-title', 'Страница пользователя')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>
      Привет! Это админка
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
         <p>view('service.index');</p>
         Текст инструкции по пользованию админкой вид - admin.subcategories.dashboard
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