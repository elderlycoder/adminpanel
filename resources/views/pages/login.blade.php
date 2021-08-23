@extends('layout2')

@section('page-title', 'Форма входа')

@section('content')
<!--main content start-->
<div class="main-content">
<div class="container">
<div class="row">
      <div class="col-md-8">

            <div class="leave-comment mr0"><!--leave comment-->
            @if(session('status'))
                  <div class="alert alert-danger">
                        {{session('status')}}
                        @endif
                  </div>
            </div>
            <h3 class="text-uppercase">ВХОД</h3>
            <br>
            <form class="form-horizontal contact-form" role="form" method="post" action="/login">
            @csrf
                  
                  <div class="form-group">
                        <div class="col-md-12">
                        <input type="text" class="form-control" id="email" name="email"
                              placeholder="Email" value="{{old('email')}}">
                        </div>
                  </div>
                  <div class="form-group">
                        <div class="col-md-12">
                        <input type="password" class="form-control" id="password" name="password"
                              placeholder="password">
                        </div>
                  </div>
                  <button type="submit" class="btn send-btn">Войти</button>

            </form>
            </div><!--end leave comment-->
      </div>
</div>
</div>
</div>
<!-- end main content-->
@endsection