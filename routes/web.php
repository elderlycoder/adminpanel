<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');
Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'RegisterController@index')->name('register');
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/{post}', 'BlogController@show')->name('blog.show');


Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/subcategories', 'SubcategoriesController');

}); 

Route::get('/product/all', 'ProductController@index')->name('products-list');
Route::get('/product/{id}', 'ProductController@getProductFromId')->name('product-from-id');

Route::get('/categories', 'VmCategoryController@index')->name('categories-list');
