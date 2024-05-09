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


//login, register, logout
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

//admin-only routes
Route::get('admin/products/create', [ProductController::class, 'create'])->middleware('can:admin');
Route::post('admin/products', [ProductController::class, 'store'])->middleware('can:admin');

//admin dashboard
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});

//edit path
Route::resource('products', ProductController::class)->names('products')->except(['edit']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');

//add to cart path
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//checkout
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

//pay
Route::post('/pay', [CartController::class, 'processPayment'])->name('payment.process');

//successful payment processing
// After successful payment processing
//return redirect()->route('payment.success')->with('success', 'Your payment of €' . number_format($total, 2) . ' has been processed successfully.');

//remove from the cart
Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

//add to wishlist
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

//remove from wishlist
Route::delete('/wishlist/remove/{productId}', [WishlistController::class, 'remove'])->name('wishlist.remove');

//search route
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

//comments section
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

//update stats
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.show')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');

//stats from the home page
Route::get('/', [DashboardController::class, 'showDashboard'])->name('home');

//contact
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::view('/contact', 'contact')->name('contact');

//explicatii
//Route::group(['prefix' => 'accounts', 'as' => 'account.'], function() {
//    Route::resource('products', ProductController::class);
//    Route::get('/test', function () {
//        dd('test');
//    })->name('test');
//});
