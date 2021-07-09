<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('page-title', 'А это по умолчанию')</title>
   <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css
">
</head>
<body>
<!-- флекс контейнер, разворачиваем по вертикали, распределяем блоки, мин высота страницы = высота экрана -->
<div class="d-flex flex-column justify-content-between min-vh-100">
@include('includes.header')
<!-- майн контейнер чтобы звнимал всё доступное пространство между шапкой и подвалом -->
<main class="flex-grow-1 py-3">
   @yield('content')
</main>
@include('includes.footer')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js



"></script>
</body>
</html>