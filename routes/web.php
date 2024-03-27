<?php
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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





Route::middleware(['IsAdmin'])->group(function () {
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/form', [CustomerController::class, 'form'])->name('customer.create');
        Route::post('/create', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/{id}',[CustomerController::class,'edit'])->name('customer.edit');
        Route::post('/{id}/update',[CustomerController::class,'update'])->name('customer.update');
        Route::get('/{id}/delete',[CustomerController::class,'delete']);
    });

    Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/form', [ProductController::class, 'form'])->name('product.create');
Route::post('/product/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/produt/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');
Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::get('/setting',function(){
    return view('setting');
});
});


Route::get('/logout', function (Request $request) {
    $request->session()->forget('admin');
    return view('login');
})->name('logout');



Route::get('/showsignup',[AuthController::class,'showsignup'])->name('signuppage');
Route::post('/signup',[AuthController::class,'signup'])->name('signup');
Route::get('/loginpage',[AuthController::class,'loginpage'])->name('loginpage');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/test', function(Request $request){

    dd($request->session()->all());
});



Route::get('/userloginpage',[UserController::class,'showLoginpage'])->name('userloginpage');
Route::post('/userlogin',[UserController::class,'userLogin'])->name('userlogin');
Route::get('/usersignuppage',[UserController::class,'userSignuppage'])->name('usersignuppage');
Route::post('/usersignup',[UserController::class,'usersignup'])->name('usersignup');


Route::get('/home',function(){
    return view('user.userhome');
});