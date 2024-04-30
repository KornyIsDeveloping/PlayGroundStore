<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
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
//home
Route::view('/', 'home')->name('home');

//products
Route::resource('products', ProductController::class)->names('products');

//wishlist
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

//remove from wishlist
Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'remove'])->name('wishlist.remove');

//contact
Route::view('/contact', 'contact')->name('contact');

//login, register, logout
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

//admin-only routes
Route::get('admin/products/create', [ProductController::class, 'create'])->middleware('can:admin');
Route::post('admin/products', [ProductController::class, 'store'])->middleware('can:admin');

//edit path
//Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');
Route::resource('products', ProductController::class)->names('products')->except(['edit']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');

//add to cart path
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//remove from the cart
Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

//search route
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

//comments section
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');



//explicatii
//Route::group(['prefix' => 'accounts', 'as' => 'account.'], function() {
//    Route::resource('products', ProductController::class);
//
//    Route::get('/test', function () {
//        dd('test');
//    })->name('test');
//});


