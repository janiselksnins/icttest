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

Route::get('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::get('/logout/{sid}', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

Route::middleware('VerifyAuthToken')->group(function () {
    Route::controller(\App\Http\Controllers\Api\ProductsController::class)->group(function () {
	Route::get('/{sid}/products', 'products');
	Route::get('/{sid}/product/{product_id}', 'products');
	Route::put('/{sid}/product', 'productedit');
	Route::put('/{sid}/attribute', 'attributeedit');
	Route::get('/{sid}/attributes', 'attributes');
	Route::delete('/{sid}/product/{product_id}', 'productdelete');
	Route::delete('/{sid}/attribute/{attribute_id}', 'attributedelete');
    });
});




