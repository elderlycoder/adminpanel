<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::register('home', function(BreadcrumbsGenerator $crumbs){
	$crumbs->push('Главная', route('home'));
});
Breadcrumbs::for('register', function (BreadcrumbsGenerator $crumbs) {
	$crumbs->push('Регистрация', route('register'));
});
Breadcrumbs::register('login', function(BreadcrumbsGenerator $crumbs){
	$crumbs->parent('home'); // родительский пункт хлебных крошек
	$crumbs->push('Вход', route('login'));
});
Breadcrumbs::register('ceo.index', function(BreadcrumbsGenerator $crumbs){
	$crumbs->parent('home'); // родительский пункт хлебных крошек
	$crumbs->push('Admin', route('ceo.index'));
});
Breadcrumbs::register('admin.users.index', function(BreadcrumbsGenerator $crumbs){
	$crumbs->parent('ceo.index'); // родительский пункт хлебных крошек
	$crumbs->push('Пользователи', route('admin.users.index'));
});
Breadcrumbs::register('admin.users.create', function(BreadcrumbsGenerator $crumbs){
	$crumbs->parent('ceo.index'); // родительский пункт хлебных крошек
	$crumbs->push('Добавление пользователя', route('admin.users.create'));
});
Breadcrumbs::register('admin.users.edit', function(BreadcrumbsGenerator $crumbs){
	$crumbs->parent('ceo.index'); // родительский пункт хлебных крошек
	$crumbs->push('Редактирование пользователя', route('admin.users.edit'));
});