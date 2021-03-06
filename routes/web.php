<?php

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


Route::get('/loginshow', function () {
   return view('login');
});
Route::get('user_sign_up' , [ App\Http\Controllers\UserController::class, 'register'])->name('usersignup');
Route::post('user_register' , [ App\Http\Controllers\UserController::class, 'userRegister'])->name('register');
Route::post('login-user' , [ App\Http\Controllers\UserController::class, 'login'])->name('loginPost');
//Route::view("profile", 'Profile');
Route::get('logout-user' , [ App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::get('/ ' , [ App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('detail/{id}' , [ App\Http\Controllers\ProductController::class, 'detail']);
Route::get('search' , [ App\Http\Controllers\ProductController::class, 'search']);
Route::get('add_to_cart/{id}' , [ App\Http\Controllers\ProductController::class, 'addtocart']);
Route::get('cartlist' , [ App\Http\Controllers\ProductController::class, 'cartList'])->name('cartlist');
Route::get('removecart/{id}' , [ App\Http\Controllers\ProductController::class, 'removeCart'])->name('removeCartItem');

Route::get('ordernow' , [ App\Http\Controllers\ProductController::class, 'orderNow'])->name('orderItemsNow');
Route::post('order_place' , [ App\Http\Controllers\ProductController::class, 'orderPlace'])->name('orderplace');

Route::get('order_list' , [ App\Http\Controllers\ProductController::class, 'orderList'])->name('orderlist');