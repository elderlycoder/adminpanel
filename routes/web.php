<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'ceo', 'namespace'=>'Admin', 'middleware'=>'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    //Route::resource('/subcategories', 'SubcategoriesController');
    Route::get('/vmcategories', 'VmCategoryController@index')->name('vmcategories-list');
    Route::get('/copycategories', 'CategoriesController@copyCategories')->name('copy-categories');
    Route::resource('/users', 'UserController');
    //Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('login', 'AuthController@loginForm')->name('login-form');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('register', 'AuthController@registerForm')->name('register-form');
    Route::post('register', 'AuthController@register')->name('register');
});
Route::group(['prefix'=>'service','namespace'=>'Service', 'middleware'=>'auth'], function(){
    Route::get('/', 'ServiceController@index');    
    Route::resource('profile', 'ProfileController');
    Route::delete('image/{id}', 'ProfileController@imageDestroy')->name('img.destroy');
    //тестовые роуты
    Route::get('/image', 'ServiceController@image')->name('image');
    Route::post('/image', 'ServiceController@addImage')->name('add-image');
});
Route::group(['middleware'=>'auth'], function(){
    Route::get('logout', 'AuthController@logout');
});

Route::view('/', 'index')->name('home');






Route::get('/product/all', 'ProductController@index')->name('products-list');
Route::get('/product/{id}', 'ProductController@getProductFromId')->name('product-from-id');


