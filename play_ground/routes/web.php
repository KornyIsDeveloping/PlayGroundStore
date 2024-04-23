<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home')->name('home');
Route::resource('products', ProductController::class)->names('products');

//wishlist
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');


//contact
Route::view('/contact', 'contact')->name('contact');

//explicatii
//Route::group(['prefix' => 'accounts', 'as' => 'account.'], function() {
//    Route::resource('products', ProductController::class);
//
//    Route::get('/test', function () {
//        dd('test');
//    })->name('test');
//});

//login, register, logout
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

//edit path
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');

//add to cart path
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::view('/cart', 'cart')->name('cart');

//search route
Route::get('/search', [ProductController::class, 'search'])->name('product.search');


