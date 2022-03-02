@extends('layouts.admin')
@section('page-title', 'Вывод категорий материалов')
@section('content')

 <section class="content">
 
  <!-- Default box -->
  <div class="box">
   <div class="box-header">
    <h2 class="box-title">Категория - {{$category->title}}</h2>
   </div>
			@forelse($category->articles as $article)
   <div>
				<p>{{$article->title}}</p>
			</div>
			@empty
			<p>Материалов нет</p>
			@endforelse
  </div>
  <!-- /.box -->

 </section>
@endsection
<!-- @section('script')
<script type="text/javascript">
 $(document).ready(function(){
 alert(jQuery.fn.jquery);
 });
 </script>
@endsection -->