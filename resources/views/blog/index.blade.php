@extends('layouts.base')

@section('page-title', 'Страница входа')

@section('content')
<h1>Список статей</h1>

<p> @json($posts)</p>
@endsection

