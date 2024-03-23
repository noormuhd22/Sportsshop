<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\AuthController;
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
Route::get('/', function () {
    return view('landingpage');
}) -> name('landingpage');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/form', [CustomerController::class, 'form'])->name('customer.create');
Route::post('/customers/create', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customers/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customers/{id}/update',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customers/{id}/delete',[CustomerController::class,'delete']);



Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/form', [ProductController::class, 'form'])->name('product.create');
Route::post('/product/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/produt/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');
Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');

Route::get('/setting',function(){
    return view('setting');
});

Route::get('/logout', function () {
    Auth::logout();
    return view('login');
})->name('logout');



Route::get('/showsignup',[AuthController::class,'showsignup'])->name('signuppage');
Route::post('/signup',[AuthController::class,'signup'])->name('signup');
Route::get('/loginpage',[AuthController::class,'loginpage'])->name('loginpage');
Route::post('/login',[AuthController::class,'login'])->name('login');


