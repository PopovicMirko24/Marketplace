<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

//Routes for views
Route::get('/', function () {
    $products = Product::where('isSold', false)->orderBy('created_at', 'desc')->get();
    return view('home', ['products' => $products]);
});

Route::get('/profile/{user}', [UserController::class, 'showUserProfile']);

Route::get('/signIn', function () {
    return view('login');
});

Route::get('/product/{product}', [ProductController::class, 'loadProductPage']);

Route::get('/user/{user}', [UserController::class, 'loadUserPage']);

Route::get('/order/{product}',  [OrderController::class, 'loadOrderPage']);

//Routes for user
Route::post('/login', [UserController::class, 'login']);
Route::post('/register',  [UserController::class, 'register']);
Route::get('/logout',  [UserController::class, 'logout']);
Route::get('/delete-user/{user}', [UserController::class, 'deleteUser']);

//Routes for product
Route::post('/create-product',  [ProductController::class, 'createProduct']);
Route::get('/edit-product/{product}',  [ProductController::class, 'showEditScreen']);
Route::post('/update-product/{product}',  [ProductController::class, 'updateProduct']);
Route::get('/delete-product/{product}',  [ProductController::class, 'deleteProduct']);

//Routes of orders
Route::post('/place-order/{product}',  [OrderController::class, 'makeOrder']);
