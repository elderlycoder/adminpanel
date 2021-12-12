@extends('admin.layout')
@section('page-title', 'Редактирование данных сервиса')
@section('content')
<div class="content-wrapper">
@include('includes.messages')
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h1>      Изменение данных сервиса {{$profile->user->name}}   </h1>
   </section>

   <!-- Main content -->
   <section class="content">

   <!-- Default box -->
   <div class="box">
   <form method="POST" action="{{route('profile.update', $profile->id)}}" enctype="multipart/form-data">
   <input name="_method" type="hidden" value="PUT">
      @csrf
      <div class="box">
         <div class="box-body">
            <div class="col-md-6">
                     <div class="form-group">
                        <label for="adres">Адрес</label>
                        <input type="text" class="form-control" name="adres" id="adres" value="{{$profile->adres}}">
                     </div>
                     <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$profile->description}}">
                     </div>
                     <div class="form-group">
                        <label for="metro">Метро</label>
                        <input type="text" class="form-control" name="metro" id="metro" value="{{$profile->metro}}">
                     </div>
                     @if(count($images) < 5)
                     <div class="form-group">
                         <div><img alt="" id="image_preview" src="/img/unnamed.jpg" class="img-responsive" width="220"></div>

                         <label for="image">Добавить картинку</label>
                         <div>
                        <input type="file" class="form-control" name="foto" id="image">

                             <input type="reset" value="Сбросить" id="reset">

                         </div>
                     </div>
                     @endif
               </div>
         </div>
      </div>
      <div class="box-header with-border">
         <button class="btn btn-success">Сохранить</button>
      </div>
   </form>
<H2>Картинки сервиса</H2>

            <div class="form-group">
               @foreach ($images as $image)
               <img src="{{$image->getImage($profile->id)}}" alt="{{$image->title}}" class="img-responsive" width="240">

               {{Form::open(['route'=>['img.destroy', $image->id], 'method'=>'delete'])}}
                        <button onclick="return confirm('Уверены? ')" type="submit" class="delete">
                        <i class="fa fa-trash"> Удалить</i>
                        </button>
                        {{Form::close()}}
               @endforeach
            </div>






</div>


   </section>
   <!-- /.content -->
</div>

@endsection


