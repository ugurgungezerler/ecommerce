<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::resource('category', CategoryController::class)->only([
    'index',
    'show',
    'store',
    'update',
    'destroy',
]);

Route::resource('products', ProductController::class)->only([
    'index',
    'show',
    'store',
    'update',
    'destroy',
]);
