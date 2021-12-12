@extends('admin.layout')
@section('page-title', 'Пользователи')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Выводим список пользователей</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="form-group">
          <a href="{{route('users.create')}}" class="btn btn-success">Добавить</a>
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
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->is_admin}}</td>
                  <!-- <td>{{$user->email_verified_at}}</td> -->
                  <td><a href="{{route('users.edit', $user->profile->id)}}" class="fa fa-pencil">5</a></td>

                  
                  

                   
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
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->
