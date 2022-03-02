@extends ('layouts.admin')
@section('page-title', 'Редактирование данных сервиса')
@section('content')

@include('includes.messages')
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>      Изменение данных сервиса {{$user->name}}   </h1>
   </section>

   <!-- Main content -->
  
   <section class="content">
      <div class="container-fluid">      
        <div class="row">            
            <div class="col-12">
              <form method="POST" action="{{route('admin.users.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')     
                <div class="form=group col-4">                  
                    <label for="name">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}">                    
                </div>
                <div class="form=group col-4">                  
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$user->slug)}}">                    
                </div>
                <div class="form-group col-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">                    
                </div>
                <div class="form-group col-4">
                    <label for="email">Пароль</label>
                    <input type="text" class="form-control" id="password" name="password" value="">                    
                </div>
                <div class="form-group col-4">
                    <label for="is_admin">Admin?</label>
                    <input type="text" class="form-control" id="is_admin" name="is_admin" value="{{old('is_admin', $user->is_admin)}}">                    
                </div>              
                <!-- /.box-body -->
                <div class="form-group">                  
                  <input type="submit" class="btn btn-primary"></input>
                </div> 
              </form>
            </div>
        </div>
      </div>  

    </section>

@endsection


