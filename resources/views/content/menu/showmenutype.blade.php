@extends('layouts.admin')
@section('page-title', 'Пункт меню')
@section('content')

<section class="content">
 
      <div class="container-fluid">
      <div class="box-header">
    <h2 class="box-title">Добавление типа меню</h2>
   </div>
   <p>Здесь пришли данные из базы Кострома</p>
   @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
        <!-- Small boxes (Stat box) -->
        <form action="{{route('content.menu.copymenutype', $menutype->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
              @method('PATCH') 
        <div class="row">          
          <div class="col-12">			      
				      
              <div class="form-group">
                  <input type="submit" class="btn btn-primary"></input>
                  </div>
              <div class="form-group col-4">
                    <label for="title">id</label>
                    <input type="text" class="form-control" name="menutype"  value={{$menutype->id}}>
                </div>
              <div class="form-group col-4">
                    <label for="title">asset_id</label>
                    <input type="text" class="form-control" name="asset_id"  value={{$menutype->asset_id}}>
                </div>
              <div class="form-group col-4">
                    <label for="title">menutype</label>
                    <input type="text" class="form-control" name="note"  value={{$menutype->menutype}}>
                </div>
              <div class="form-group col-4">
                    <label for="title">title</label>
                    <!-- <input type="text" class="form-control" name="title" maxlength = "60"  value={{$menutype->title}}> -->
                    <textarea class="form-control" name="title">{{$menutype->title}}</textarea>
                </div>
              <div class="form-group col-4">
                    <label for="title">description</label>
                    <input type="text" class="form-control" name="description"  value={{$menutype->description}}>
                </div>
            </div>    
                
        </div>           
        </form>
         
             
        
      </div><!-- /.container-fluid -->
    </section>
@endsection
