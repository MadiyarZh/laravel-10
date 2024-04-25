<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/products', function () {
//     // return view('products');
// })->name('products');

Route::get('/api/products', [ProductController::class, 'index'])->name('products');
Route::get('/api/product/{id}', [ProductController::class, 'show'])->name('product-detail');
Route::post('/api/product/create', [ProductController::class, 'store'])->name('product-form');

Route::get('/api/product/update/{id}', [ProductController::class, 'update'])->name('product-update');
Route::patch('/api/product/update/{id}', [ProductController::class, 'updateSubmit'])->name('product-update-submit');

Route::get('/api/product/{id}/delete/', [ProductController::class, 'delete'])->name('product-delete');

Route::get('/api/product/brand/{name}', [ProductController::class, 'getByBrand'])->name('product-by-brand');


