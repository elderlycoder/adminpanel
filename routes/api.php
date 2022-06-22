<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('favorit-parts.ru/hs/hsprice/?key=84CF3558-FF69-11E7-8130-0050568E1762&number={sku}&brand={mpn}&analogues=off', [App\Http\Controllers\ProductController::class, 'getFreshPriceProduct'])
->name('product.refresh');
// Route::get('favorit-parts.ru/hs/hsprice/?key=84CF3558-FF69-11E7-8130-0050568E1762&number={sku}&brand={mpn}&analogues=off', function(){return 'hello';})
	
//  ->name('product.refresh');
