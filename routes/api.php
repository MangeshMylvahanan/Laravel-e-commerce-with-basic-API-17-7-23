<?php

use App\Http\Controllers\Api\ItemsCartController;
use App\Http\Controllers\Api\ItemsController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//register and login
Route::post('/userregister',[RegisterController::class,'UserRegister']);
Route::post('/login',[RegisterController::class,'Login']);
Route::post('/sellerregister',[RegisterController::class,'registerSeller']);
//productsadd
Route::post('/Addproducts',[ItemsController::class,'createProduct'])->name('productsadd')->middleware(['auth:api']);
//cart
Route::post('addtocart',[ItemsCartController::class,'addToCart'])->middleware(['auth:api']);
//billing details
Route::post('/billing',[OrdersController::class,'store']);
//get routes
Route::get('/homepage',[ItemsController::class,'home']);
Route::get('/product/{id}', [ItemsController::class, 'Productdetails']);
Route::get('/searchproduct', [ItemsController::class, 'SearchProduct']);
Route::get('/cart-product-list',[ItemsCartController::class,'CartList']);
Route::delete('/removeCart/{id}', [ItemsCartController::class, 'removeCart']);
//trial
Route::get('user/details',function(Request $request){
    return response()->json(['user' => Auth::user()]);
})->middleware('auth:api')->name('userdetails');