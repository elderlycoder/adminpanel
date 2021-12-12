@extends('admin.layout')
@section('page-title', 'Админка | Главная')
@section('content')

<div class="content-wrapper" style="min-height:700px;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>
      Привет! Это админка
   </h1>
   
   </section>
   <App></App>
   <!-- Main content -->
   <section class="content">

   <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Главная страница</h3>
      </div>
      <div class="box-body">
         Текст инструкции по пользованию админкой вид - admin.dashboard
      </div>
      
      <div class="box-footer">
         и здесь есть место для какого-нибудь текста
      </div>
      
   </div>
   

   </section>
   
</div>
@endsection