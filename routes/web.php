<?php

use App\Http\Controllers\UserController;
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
    return view('home');
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
