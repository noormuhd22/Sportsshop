<?php
use Illuminate\Http\Request;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderstatusController;

use App\Http\Controllers\OrderController;
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

Route::get('/welcome', function () {
    return view('welcome');
});




//middle ware 
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


 Route::prefix('category')->group(function(){
  Route::get('/',[CategoryController::class,'index'])->name('category.index');
  Route::get('/form',[CategoryController::class,'create'])->name('category.create');
  Route::post('/form/submit',[CategoryController::class,'store'])->name('category.store');
  Route::get('/{id}',[CategoryController::class,'edit'])->name('category.edit');
  Route::post('/{id}/update',[CategoryController::class,'update'])->name('category.update');
  Route::get('/{id}/delete',[CategoryController::class,'delete'])->name('category.delete');
});


Route::get('/orders',[OrderController::class,'index'])->name('order.index');
 Route::get('/orders/{id}',[OrderController::class,'show'])->name('order.view'); // Corrected route definition


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
Route::get('/message',function(){
    $message = message::all();
    return view('message',['message'=>$message]);
});





















//userloginandsignup
Route::get('/userloginpage',[UserController::class,'showLoginpage'])->name('userloginpage');
Route::post('/userlogin',[UserController::class,'userLogin'])->name('userlogin');
Route::get('/usersignuppage',[UserController::class,'userSignuppage'])->name('usersignuppage');
Route::post('/usersignup',[UserController::class,'usersignup'])->name('usersignup');



//middleware for user
 Route::middleware('IsUser')->group( function(){
//user pages
 Route::get('/home', function () {
     $products = Product::where('status', 0)->get(); 
    return view('user.userhome', ['products' => $products]);
 })->name('home');
 Route::get('/categories', function () {
    // Retrieve all categories from the database
     $categories = categories::all(); 
    return view('user.categories', ['categories' => $categories]);
})->name('categories');
 Route::get('/contactus',function(){
    return view('user.contactus');
    })->name('contactus');
 Route::get('/products',function(request $request){
      $products = Product::where('status', 0)->get();
      $user = $request->session()->get('user');
    return view('user.products',['products'=>$products,'user' => $user]);
     })->name('products');

    
    
    
    
  
    Route::get('/cart', function (Request $request) {
    $user = session('user');
    // Fetch only the cart items associated with the logged-in user
    $cart = Cart::where('userid', $user)->get();
    return view('user.cart', ['cart' => $cart,'user' => $user]);
    });



   Route::get('/logoutuser', function (Request $request) {
    $request->session()->forget('user');
    return view('userlogin');
    })->name('userlogout');

//action controller for cart and payment
    Route::post('/cart',[ActionController::class,'cart'])->name('cart');
    Route::post('/contactus/submit', [ActionController::class,'submitForm'])->name('submitform');
    Route::post('cart/delete',[ActionController::class,'deleteCart'])->name('deletecart');
    Route::post('/update-quantity', [ActionController::class,'updateQuantity'])->name('update-quantity');
    Route::get('cart/checkout', [ActionController::class, 'checkout'])->name('checkout');
    Route::post('/buynow/checkout',[ActionController::class,'buynowCheckout'])->name('buynow.checkout');
 



    //buynow payment process
    Route::post('/buynow-payment-process',[PaymentController::class,'buynowpaymentProcess'])->name('buynowpayment.process');

    Route::post('/payment-process',[PaymentController::class,'paymentProcess'])->name('payment.process');
    Route::get('/payment-success',[PaymentController::class,'paymentSuccess'])->name('payment.success');

//user ordr and vieww page
     Route::get('/order',[OrderstatusController::class,'index'])->name('user.orders');
    Route::get('/orderview/{id}',[OrderstatusController::class,'show'])->name('user.view');



   
    
    //cart count
Route::get('/cart/count', function (Request $request) {
    $user = $request->session()->get('user');
    
    $cartCount = Cart::where('userid', $user)->count(); // Assuming you have a method to get the cart count
    
    return response()->json(['count' => $cartCount]);
})->name('cart.count');

});
