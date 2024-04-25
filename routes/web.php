<?php
use Illuminate\Http\Request;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Adminlogin\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ActionController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\OrderstatusController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SportsController;
use App\Http\Controllers\User\Index\ShowpageController;
use App\Http\Controllers\Adminorders\OrderController;
use App\Http\Controllers\Adminmessage\MessageController;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\categories;
use App\Models\Cart;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\Message; 






//


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

Route::get('/welcome',[MessageController::class,'viewadminhome']);




//middle ware 
 Route::middleware(['IsAdmin'])->group(function () {
 Route::prefix('customers')->group(function () {
 Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
 Route::get('/{id}',[CustomerController::class,'edit'])->name('customer.edit');
 Route::post('/{id}/update',[CustomerController::class,'update'])->name('customer.update');
 Route::get('/{id}/delete',[CustomerController::class,'delete']);
    });
//admin  product
Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/form', [ProductController::class, 'form'])->name('product.create');
Route::post('/product/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/produt/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');
Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');

//admin category
Route::prefix('category')->group(function(){
Route::get('/',[CategoryController::class,'index'])->name('category.index');
Route::get('/form',[CategoryController::class,'create'])->name('category.create');
Route::post('/form/submit',[CategoryController::class,'store'])->name('category.store');
Route::get('/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/{id}/delete',[CategoryController::class,'delete'])->name('category.delete');
  });


 //group of orders
Route::prefix('orders')->group(function(){
 //orders
Route::get('/',[OrderController::class,'index'])->name('order.index');
Route::get('/{id}',[OrderController::class,'show'])->name('order.view'); // Corrected route definition
 //change status ---new
Route::post('/updatestatus/{id}',[OrderController::class,'changeStatus'])->name('update.status');

 });

 });





Route::get('/logout',[AuthController::class,'logout'])->name('logout');




Route::get('/showsignup',[AuthController::class,'showsignup'])->name('signuppage');
Route::post('/signup',[AuthController::class,'signup'])->name('signup');
Route::get('/loginpage',[AuthController::class,'loginpage'])->name('loginpage');
Route::post('/login',[AuthController::class,'login'])->name('login');



//route to display all the session
Route::get('/test',[MessageController::class,'viewTest']);
//admin message
Route::get('/message',[MessageController::class,'viewMessage']);






















//user logout ,loginandsignup
Route::get('/userloginpage',[UserController::class,'showLoginpage'])->name('userloginpage');
Route::post('/userlogin',[UserController::class,'userLogin'])->name('userlogin');
Route::get('/usersignuppage',[UserController::class,'userSignuppage'])->name('usersignuppage');
Route::post('/usersignup',[UserController::class,'usersignup'])->name('usersignup');
Route::get('/logoutuser', function (Request $request) {



 $request->session()->forget('user');
return view('userlogin.userlogin');
})->name('userlogout');




//middleware for user
Route::middleware('IsUser')->group( function(){
//user home,categories,contactus,product pages
Route::get('/home',[ShowpageController::class,'viewHome']) ->name('home');
Route::get('/categories',[ShowpageController::class,'viewCategory'])->name('categories');
Route::get('/contactus',[ShowpageController::class,'viewContactus'])->name('contactus');
Route::get('/products',[ShowpageController::class,'viewProducts'])->name('products');
Route::get('/cart',[ShowpageController::class,'viewCart']);
Route::get('/aboutus',[ShowpageController::class,'viewAboutus'])->name('aboutus');

//sports category
Route::get('/sportscollection',[SportsController::class,'index'])->name('sports');



//action controller for actions used in cart,contactus page
Route::post('/cart',[ActionController::class,'cart'])->name('cart');
Route::post('/contactus/submit', [ActionController::class,'submitForm'])->name('submitform');
Route::post('cart/delete',[ActionController::class,'deleteCart'])->name('deletecart');
Route::post('/update-quantity', [ActionController::class,'updateQuantity'])->name('update-quantity');
Route::get('cart/checkout', [ActionController::class, 'checkout'])->name('checkout');
Route::post('/buynow/checkout',[ActionController::class,'buynowCheckout'])->name('buynow.checkout');
 


//paymentcontroller used to manage payments in buynow and cart
//buynow payment process
Route::post('/buynow-payment-process',[PaymentController::class,'buynowpaymentProcess'])->name('buynowpayment.process');
Route::post('/payment-process',[PaymentController::class,'paymentProcess'])->name('payment.process');
Route::get('/payment-success',[PaymentController::class,'paymentSuccess'])->name('payment.success');



//orderstatuscontroller for manage orderview and indexpage
//user order and view page
Route::get('/order',[OrderstatusController::class,'index'])->name('user.orders');
Route::get('/orderview/{id}',[OrderstatusController::class,'show'])->name('user.view');

Route::get('/cart/count',[ShowpageController::class,'cartCount'])->name('cart.count'); 
//profile view
Route::get('/profile',[ProfileController::class,'index'])->name('profile.view');
Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update');

});
