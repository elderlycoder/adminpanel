@extends('layouts.admin')
@section('page-title', 'Вывод обновлённого материала')
@section('content')

<section class="content">
 
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{route('content.article.updatedsend', $article->id)}}" method="POST" enctype="multipart/form-data">
        <div class="row">          
          <div class="col-12">
			      <form action="#" method="POST" enctype="multipart/form-data">
				      @csrf
              @method('PATCH') 
              <div class="form-group">
                  <input type="submit" class="btn btn-primary"></input>
                  </div>
              <div class="form-group col-4">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" name="title"  value={{$article->title}}>
                </div>
                <div class="form-group">
                    <label for="title">Вступительный текст</label>
                    <textarea class="form-control" id="summernote" name="introtext">{{$article->introtext}}</textarea>                    
                </div>
                <div class="form-group">
                    <label for="title">Полный текст</label>
                    <textarea class="form-control" id="summernote" name="fulltext">{{$article->fulltext}}</textarea>                    
                </div>
                <div class="form-group col-4">
                    <label for="title">Metadesc</label>
                    <textarea class="form-control" name="metadesc">{{$article->metadesc}}</textarea>
                </div>
                <div class="form-group col-4">
                    <label for="title">Metakey</label>
                    <input type="text" class="form-control" name="metakey" value={{$article->metakey}}>
                </div>
                <div class="form-group col-4">
                    <label for="title">Metadata</label>
                    <textarea class="form-control" name="metadata">{{$article->metadata}}</textarea>
                </div>
                  
            </form>
          </div>
        </div>
       
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
