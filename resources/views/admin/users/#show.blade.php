@extends('admin.layout')
@section('page-title', 'Пользователи')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Выводим услуги пользователя {{$user->name}}</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Категории Админ панели</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h2>Пользователи</h2>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>name</th>
                  <th>email</th>
                  <!-- <th>email_verified_at</th> -->
                  
                  <th>is_admin</th>
                  <th>Услуги</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</></td>
                  <td>{{$user->email}}</td>
                  <!-- <td>{{$user->email_verified_at}}</td> -->
                  <td>{{$user->is_admin}}</td>
                  <td><a href="{{route('users.show', $user->id)}}" class="fa fa-pencil"></a></td>
                   
                </tr>
                
                
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
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->
