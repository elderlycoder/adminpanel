@extends('layouts.base')

@section('page-title', 'Все услуги')

@section('content')
   <h1>Все услуги</h1>
   @foreach($category as $el)
      <div class="alert alert-info">
         <h3>{{ $el->category_name }}</h3>
      </div>
   @endforeach
@endsection 