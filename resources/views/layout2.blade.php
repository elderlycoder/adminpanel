<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('page-title', 'А это по умолчанию')</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link  rel="stylesheet" href="/css/admin.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<header class="main-header">
   <!-- Logo -->
   <a href="../../index2.html" class="logo">
   <!-- mini logo for sidebar mini 50x50 pixels -->
   <span class="logo-mini">A</span>
   <!-- logo for regular state and mobile devices -->
   <span class="logo-lg"><b>ОКЕЙ-АВТО</b></span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
   <!-- Sidebar toggle button-->
   <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </a> -->

   <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
         <!--Проверяем авторизован ли пользователь, если да показываем ссылку на профиль и выход -->
         <!--если нет, ссылки на вход и регистрацию -->
         @if(Auth::check())
            <li class="btn"><a href="/profile">Профиль</a></li>
            <li class="btn"><a href="/logout">Выход</a></li>
         @else
            <li class="btn"><a href="{{route('login-form')}}">ВХОД</a></li>
            <li class="btn"><a href="{{route('register-form')}}">РЕГИСТРАЦИЯ</a></li>
            <li class="btn">Добавить сервис?</li> 
         @endif
                 
      </ul>
   </div>
   </nav>
</header>
<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->
<footer class="main-footer">
   <div class="pull-right hidden-xs">
   <b>Version</b> 2.3.7
   </div>
   <strong>Copyright &copy; 2014-2021 <a href="https://okeyavto.ru/">ОКЕЙ-АВТО</a>.</strong> All rights
   reserved.
</footer>

<!-- ./wrapper -->
<script src="/js/admin.js"></script>
<!-- @yield('script') -->
</body>