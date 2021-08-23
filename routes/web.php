<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'ceo', 'namespace'=>'Admin', 'middleware'=>'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/subcategories', 'SubcategoriesController');
    Route::get('/vmcategories', 'VmCategoryController@index')->name('vmcategories-list');
    Route::get('/copycategories', 'SubcategoriesController@copyCategories')->name('copy-categories');
}); 

Route::group(['middleware'=>'guest'], function(){
    Route::get('login', 'AuthController@loginForm')->name('login-form');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('register', 'AuthController@registerForm')->name('register-form');
    Route::post('register', 'AuthController@register')->name('register');
});
Route::group(['middleware'=>'auth'], function(){
    Route::get('logout', 'AuthController@logout');
});

Route::view('/', 'home.index')->name('home');






Route::get('/product/all', 'ProductController@index')->name('products-list');
Route::get('/product/{id}', 'ProductController@getProductFromId')->name('product-from-id');


