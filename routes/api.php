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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['cors', 'verifyToken']], function () {

    // product
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'list'])->name('api.product');
    Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'get'])->name('api.product.get');
    Route::post('/product', [App\Http\Controllers\ProductController::class, 'save'])->name('api.product.save');
    Route::delete('/product/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('api.product.delete');

    // catalogue
    Route::get('/catalogue', [App\Http\Controllers\CatalogueController::class, 'list'])->name('api.catalogue');
    Route::get('/catalogue/{id}', [App\Http\Controllers\CatalogueController::class, 'get'])->name('api.catalogue.get');
    Route::post('/catalogue', [App\Http\Controllers\CatalogueController::class, 'save'])->name('api.catalogue.save');
    Route::delete('/catalogue/{id}', [App\Http\Controllers\CatalogueController::class, 'delete'])->name('api.catalogue.delete');
});