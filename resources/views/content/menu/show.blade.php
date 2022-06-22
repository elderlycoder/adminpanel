@extends('layouts.admin')
@section('page-title', 'Пункт меню')
@section('content')

<section class="content">

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <form action="{{route('content.menu.copy', $menu->id)}}" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <input type="submit" class="btn btn-primary"></input>
          </div>
          <div class="form-group col-4">
            <label for="title">menutype</label>
            <input type="text" class="form-control" name="menutype" value={{$menu->menutype}}>
          </div>
          <div class="form-group col-4">
            <label for="title">title</label>
            <input type="text" class="form-control" name="title" value={{$menu->title}}>
          </div>
          <div class="form-group col-4">
            <label for="title">note</label>
            <input type="text" class="form-control" name="note" value={{$menu->note}}>
          </div>
          <div class="form-group col-4">
            <label for="title">path</label>
            <input type="text" class="form-control" name="path" value={{$menu->path}}>
          </div>
          <div class="form-group col-4">
            <label for="title">type</label>
            <input type="text" class="form-control" name="type" value={{$menu->type}}>
          </div>
        </div>

      </div>
    </form>



  </div><!-- /.container-fluid -->
</section>
@endsection