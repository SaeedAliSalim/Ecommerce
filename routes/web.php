<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\cart;

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FirstController::class, 'MainPage']);

Route::get('/products/{catid?}', [FirstController::class, 'GetCategoriesProducts'])->name('products');

Route::get('/category', [FirstController::class, 'GetAllCategoriesWithProducts'])->name('category');

Route::get('/addproduct', [ProductController::class, 'AddNewProduct'])->middleware('auth');

Route::post('/storeproduct', [ProductController::class, 'StoreProduct']);

Route::get('/removeproduct/{id}', [ProductController::class, 'RemoveProduct']);

Route::get('/editproduct/{id?}', [ProductController::class, 'EditProduct']);

Route::get('/review', [FirstController::class, 'Review']);

Route::post('/storereview', [FirstController::class, 'StoreReview']);

Route::post('/search', [ProductController::class, 'Search']);

Route::get('/datatable', [ProductController::class, 'DataTable']);

Route::get('/cart', [CartController::class, 'Cart'])
    ->name('carts')
    ->middleware('auth');

Route::get('/addproducttocart/{productid}', [cartController::class, 'AddProductToCart'])-> middleware('auth');


