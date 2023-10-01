<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Category\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('about',function (){
    return view('about');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('products', [\App\Http\Controllers\Product\ProductController::class, 'index']);
Route::get('products/create', [\App\Http\Controllers\Product\ProductController::class, 'create']);
Route::post('products', [\App\Http\Controllers\Product\ProductController::class, 'store'])->name('product.store');
Route::delete('products', [\App\Http\Controllers\Product\ProductController::class, 'store']);
Route::options('products', [\App\Http\Controllers\Product\ProductController::class, 'store']);
Route::patch('products', [\App\Http\Controllers\Product\ProductController::class, 'store']);


Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
