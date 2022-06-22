<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Content\CategoriesController;
use App\Http\Controllers\Admin\Content\ArticlesController;
use App\Http\Controllers\Admin\Content\NewArticlesController;
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
        Route::group(['prefix'=>'articles'], function(){
            Route::get('/', [ArticlesController::class, 'articlesList'])->name('content.articles.index');
            Route::get('/{article}', [ArticlesController::class, 'showArticle'])->name('content.article.show'); 
            Route::patch('/{article}/updatesend', [ArticlesController::class, 'send'])->name('content.article.updatedsend');
        });
        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', [CategoriesController::class, 'index'])->name('content.categories.index');
            Route::get('/{category}', [CategoriesController::class, 'show'])->name('content.categories.show');
            Route::get('/copycategory/{category}', [CategoriesController::class, 'copy'])->name('content.categories.copy');
        });
        Route::group(['prefix'=>'menu'], function(){
            Route::get('/', [App\Http\Controllers\Admin\Content\MenuController::class, 'index'])->name('content.menu.index');
            Route::get('/{menu}', [App\Http\Controllers\Admin\Content\MenuController::class, 'show'])->name('content.menu.show');
            Route::patch('/{menu}/copy', [App\Http\Controllers\Admin\Content\MenuController::class, 'copy'])->name('content.menu.copy');
            Route::get('/{menutype}/show', [App\Http\Controllers\Admin\Content\MenuController::class, 'showMenuType'])->name('content.menu.showmenutype');
            Route::patch('/{menutype}/copyMenuType', [App\Http\Controllers\Admin\Content\MenuController::class, 'copyMenuType'])->name('content.menu.copymenutype');

        });
    });
    Route::group(['prefix'=>'vm'], function(){
        Route::group(['prefix'=>'categories'], function(){
            Route::get('/', [App\Http\Controllers\Admin\VM\VMCategoryController::class, 'index'])->name('admin.vm.categories.index');
            Route::get('/new', [App\Http\Controllers\Admin\VM\VMCategoryController::class, 'new'])->name('admin.vm.categories.new');
            Route::get('/new/{category}/show', [App\Http\Controllers\Admin\VM\VMCategoryController::class, 'show'])->name('admin.vm.categories.show');
            Route::patch('/new/{category}/copy', [App\Http\Controllers\Admin\VM\VMCategoryController::class, 'copy'])->name('admin.vm.categories.copy');
        });
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

// Route::get('/product/all', 'ProductController@index')->name('products-list');
// Route::get('/products/{product}', 'ProductController@getProductFromId')->name('product-from-id');
// Route::get('/products/category/{id}', 'ProductController@getProductCategory')->name('productscategory');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get ('/{page}', 'IndexController')->where('page', '.*')->name('sample-page');