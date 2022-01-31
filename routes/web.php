<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutCotnroller;
use App\Http\Controllers\CotactUsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SaveForLaterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopCotnroller;
use App\Http\Controllers\UsersController;
use App\Models\User;
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

Route::get('/', [LandingPageController::class,'index'])->name('landingpage');

Route::get('/Aboutus',[AboutUsController::class,'index'])->name('aboutus');


Route::get('/Contactus',[CotactUsController::class,'index'])->name('contactus');

Route::get('/search', [SearchController::class,'index'])->name('search');


Route::resource('/shop',ShopCotnroller::class)
->name('index','shop.index')
->name('show','shop.show')
->name('store','shop.store');


Route::resource('/cart',CartController::class)
->name('index','cart.index')
->name('show','cart.show')
->name('store','cart.store')
->name('update','cart.update');

Route::middleware('auth')->group(function () {
 

    Route::get('/my-profile', [UsersController::class,'edit'])->name('users.edit');
    Route::patch('/my-profile', [UsersController::class,'update'])->name('users.update');

    Route::get('/my-orders', [OrdersController::class,'index'])->name('orders.index');
    Route::get('/my-orders/{order}', [OrdersController::class,'show'])->name('orders.show');
});

Route::post('/coupon', [CouponsController::class,'store'])->name('coupon.store');
Route::delete('/coupon',[CouponsController::class,'destroy'])->name('coupon.destroy');

Route::post('/cart/switchToSaveForLater/{product}',[CartController::class,'switchToSaveForLater'])
->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', [SaveForLaterController::class,'destroy'])->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', [SaveForLaterController::class,'switchToCart'])->name('saveForLater.switchToCart');

Route::resource('/checkout',CheckOutCotnroller::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
