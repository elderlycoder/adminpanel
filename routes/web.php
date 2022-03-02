<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Content\CategoriesController;
use App\Http\Controllers\Admin\Content\ArticlesController;
//use App\Http\Controllers\Admin\Content\CategoriesController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\IndexController;

Route::get('/', IndexController::class)->name('home');

Route::group(['prefix'=>'ceo', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('/', 'DashboardController@index')->name('ceo.index');
    Route::group(['prefix'=>'users'], function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create'); //
        Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');        
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.users.update');
        
    });
    Route::group(['prefix'=>'content'], function(){
        Route::get('/articles', [ArticlesController::class, 'updatedArticlesList'])->name('content.articles.updated');

        Route::get('/', [CategoriesController::class, 'index'])->name('content.categories.index');
        Route::get('/{category}', [CategoriesController::class, 'show'])->name('content.categories.show');

        Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('content.article.show');        
        Route::patch('/articles/{article}/send', [ArticlesController::class, 'send'])->name('content.article.send');        
        
    });
    
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/products', 'ProductController');
    Route::resource('/subcategories', 'SubcategoryController');
    Route::get('/vmcategories', 'VmCategoryController@index')->name('vmcategories-list');
    Route::get('/copycategories', 'CategoriesController@copyCategories')->name('copy_categories');
    //Route::resource('/users', 'UserController');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware'=>'guest'], function(){
    //Route::get('login', 'AuthController@loginForm')->name('login-form');
    //Route::post('login', 'AuthController@login')->name('login');
    //Route::get('register', 'AuthController@registerForm')->name('register-form');
    //Route::post('register', 'AuthController@register')->name('register');
});
Route::group(['prefix'=>'service','namespace'=>'Service', 'middleware'=>'auth'], function(){
    Route::get('/', 'ServiceController@index')->name('service.index');    
    Route::resource('profile', 'ProfileController');
    Route::delete('image/{id}', 'ProfileController@imageDestroy')->name('img.destroy');
    //тестовые роуты
    Route::get('/image', 'ServiceController@image')->name('image');
    Route::post('/image', 'ServiceController@addImage')->name('add-image');
});
Route::group(['middleware'=>'auth'], function(){
    Route::get('logout', 'AuthController@logout');
});

//Route::view('/', 'index')->name('home');

Route::get('/product/all', 'ProductController@index')->name('products-list');
Route::get('/products/{product}', 'ProductController@getProductFromId')->name('product-from-id');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get ('/{page}', 'IndexController')->where('page', '.*')->name('sample-page');