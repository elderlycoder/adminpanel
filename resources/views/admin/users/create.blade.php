@extends ('layouts.admin')
@section('page-title', 'Добавление пользователя')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Добавление нового пользователя</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <h2>Пользователи</h2>
              <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
  @csrf
      <!-- Default box -->
      
        <div class="box-body">
          <div class="col-md-4">
            <div class="form-group">
              <label for="name">Название</label>
              <input type="text" class="form-control" id="name" placeholder="serv1" name="name" value="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="">

            </div>
          </div>

        <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Полный текст</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>
        </div>
        <!-- checkbox -->
        <div class="col-md-4">
            <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="is_featured">
              </label>
              <label>
                Рекомендовать
              </label>
            </div>
              <div class="form-group">
              <label>
                <input type="checkbox" class="minimal" name="status">
              </label>
              <label>
                Черновик
              </label>
            </div  >
            <!-- checkbox -->
          </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </form>
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
