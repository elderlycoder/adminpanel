@extends ('layouts.admin')
@section('page-title', 'Добавление пользователя')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Добавление нового пользователя</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">      
        <div class="row">            
            <div class="col-12">
              <form method="POST" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                @csrf     
                <div class="form=group col-4">                  
                    <label for="name">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="">                    
                </div>
                <div class="form=group col-4">                  
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="">                    
                </div>
                <div class="form-group col-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value={{old('email')}}>                    
                </div>
                <div class="form-group col-4">
                    <label for="email">Пароль</label>
                    <input type="text" class="form-control" id="password" name="password" value="">                    
                </div>
                <div class="form-group col-4">
                    <label for="is_admin">Admin?</label>
                    <input type="text" class="form-control" id="is_admin" name="is_admin" value={{old('is_admin')}}>                    
                </div>              
                <!-- /.box-body -->
                <div class="box-footer">
                  <button class="btn btn-default">Назад</button>
                  <button class="btn btn-success pull-right">Добавить</button>
                </div> 
              </form>
            </div>
        </div>
      </div>  

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->
