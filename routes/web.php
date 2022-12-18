<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\BrandsController as ControllersBrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('Home');
// });
// Route::prefix('client')->name('client.')->group(function () {
//     Route::get('/', function () {
//         return view('Home');
//     });
//     Route::resource('categories', ControllersCategoriesController::class);
//     Route::resource('brands', ControllersBrandsController::class);
//     Route::resource('products', ProductController::class);
// });
// http://127.0.0.1:8080/admin

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/shopping-cart',function() {
//     return view('shopping-cart');
// });
Route::get('/shopping-cart', [HomeController::class, 'shopping'])->name('shopping.cart');
Route::get('/shopping-cart/update', [HomeController::class, 'shopping'])->name('shopping.update');

// 


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.default');
    });
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('brands', BrandsController::class);
    Route::resource('products', ProductsController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';