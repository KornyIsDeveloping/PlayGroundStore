<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
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
Route::resource('products', ProductController::class);
Route::view('/cart', 'cart');
Route::view('/wishlist', 'wishlist');
Route::view('/contact', 'contact');

Route::view('/test', 'test');

//Route::group(['prefix' => 'accounts', 'as' => 'account.'], function() {
//    Route::resource('products', ProductController::class);
//
//    Route::get('/test', function () {
//        dd('test');
//    })->name('test');
//});




//Route::get('/', function () {
//    return view('home');
//});
//
//Route::get('/jobs', function () {
//    $jobs = Job::with('employer')->latest()->simplePaginate(3);
//
//    return view('jobs.index', [
//        'jobs' => $jobs
//    ]);
//});

//Route::get('/products/create', function () {
//    return view('products.create');
//});
//
//Route::get('/products/{id}', function ($id) {
//    $product = (new App\Models\Product)->find($id);
//
//    return view('product.show', ['product' => $product]);
//});
//
//Route::post('/products', function () {
//    // validation...
//
//    (new App\Models\Product)->create([
//        'name' => request('name'),
//        'description' => request('description'),
//        'price' => request('price'),
//        'currency' => request('currency'),
//        'product_id' => 1
//    ]);
//
//    return redirect('/products');
//});

//Route::get('/contact', function () {
//    return view('contact');
//});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');



