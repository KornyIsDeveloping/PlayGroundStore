<?php
//
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

//authentication
Route::name('auth.')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});

//products
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class)->names('products');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    //admin-only
    Route::middleware('can:admin')->group(function () {
        Route::get('admin/products/create', [ProductController::class, 'create']);
        Route::post('admin/products', [ProductController::class, 'store']);
    });
});

//cart
Route::name('cart.')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('add');
    Route::get('/cart', [CartController::class, 'index'])->name('index');
    Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('remove');
});

//wishlist
Route::name('wishlist.')->group(function () {
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('add');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('index');
    Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'remove'])->name('remove');
});

//comment
Route::middleware('auth')->prefix('comments')->name('comments.')->group(function () {
    Route::get('/', [CommentController::class, 'index'])->name('index');
    Route::post('/', [CommentController::class, 'store'])->name('store');
    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('destroy');
});

//dashboard and home
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'showDashboard'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.show');
});

//contact
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


