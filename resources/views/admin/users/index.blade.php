@extends ('layouts.admin')
@section('page-title', 'Пользователи')
@section('content')
<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Выводим список пользователей</h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

      <!-- Default box -->
      <div class="row">
        <div class="form-group">
          <a href="{{route('admin.users.create')}}" class="btn btn-success">Добавить</a>
        </div>
            <!-- /.box-header -->
            <div class="col-12">
            <div class="card">
              <h2>Пользователи</h2>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>name</th>
                  <th>email</th>
                  <!-- <th>email_verified_at</th> -->
                  
                  <th>is_admin</th>
                  <th>Действия</th>
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
                  <td>
                  @if ($user->profile)
                  <a href="{{route('admin.users.edit', $user->profile->id)}}" class="fa fa-pencil">Профиль</a>
                  @endif
                  <a href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-edit"></i></a>
                  </td>
                  

                   
                </tr>
                @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->
