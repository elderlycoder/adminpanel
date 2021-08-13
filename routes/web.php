<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'ceo', 'namespace'=>'Admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/subcategories', 'SubcategoriesController');
    Route::get('/vmcategories', 'VmCategoryController@index')->name('vmcategories-list');
    Route::get('/copycategories', 'CategoriesController@copyCategories')->name('copy-categories');
}); 

Route::view('/', 'home.index')->name('home');
Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'RegisterController@index')->name('register');
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/{post}', 'BlogController@show')->name('blog.show');




Route::get('/product/all', 'ProductController@index')->name('products-list');
Route::get('/product/{id}', 'ProductController@getProductFromId')->name('product-from-id');


