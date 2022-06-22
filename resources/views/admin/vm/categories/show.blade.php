@extends('layouts.admin')
@section('page-title', 'Пункт меню')
@section('content')

<section class="content">
 
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="{{route('admin.vm.categories.copy', $category->virtuemart_category_id)}}" method="POST" enctype="multipart/form-data">
        <div class="row">          
          <div class="col-12">			      
				      @csrf
              @method('PATCH') 
              <div class="form-group">
                  <input type="submit" class="btn btn-primary"></input>
                  </div>
              <div class="form-group col-4">
                    <label for="title">virtuemart_category_id</label>
                    <input type="text" class="form-control" name="virtuemart_category_id"  value={{$category->virtuemart_category_id}}>
                </div>
              <div class="form-group col-4">
                    <label for="title">category_name</label>
                    <input type="text" class="form-control" name="title"  value={{$category->category_name}}>
                </div>
              <div class="form-group col-4">
                    <label for="title">slug</label>
                    <input type="text" class="form-control" name="title"  value={{$category->slug}}>
                </div>
              
            </div>    
                
        </div>           
        </form>
         
             
        
      </div><!-- /.container-fluid -->
    </section>
@endsection
