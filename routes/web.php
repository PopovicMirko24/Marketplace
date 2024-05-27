<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('home', ['products' => $products]);
});

Route::get('/profile', function () {
    return view('user');
});

Route::get('/signIn', function () {
    return view('login');
});

//Routes for login and register
Route::post('/login', [UserController::class, 'login']);
Route::post('/register',  [UserController::class, 'register']);
Route::get('/logout',  [UserController::class, 'logout']);

//Routes for product
Route::post('/create-product',  [ProductController::class, 'createProduct']);

