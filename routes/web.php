<?php

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\Food\FoodPageController;
use App\Http\Controllers\Website\Food\SearchForFoodController;
use App\Http\Controllers\Website\Category\CategoryPageController;
use App\Http\Controllers\Website\Cart\CartPageController;
use App\Http\Controllers\Website\FoodOfCat\FoodOfCatController;
use App\Http\Controllers\Website\Order\OrderController;
use App\Http\Controllers\Website\UserProfile\UserProfileController;
use App\Mail\WelcomeMail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route::get('/send', function () {
//     Mail::to('mostafa01553672023@gmail.com')->send(new WelcomeMail());
//     return route('home');
// });

Auth::routes(['verify' => true]);

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/cart', [CartPageController::class, 'index'])->name('cartPage');
    Route::post('/cart/add', [CartPageController::class, 'addCartItem'])->name('addToCart');
    Route::post('/cart/item/delete', [CartPageController::class, 'deleteCartItem']);
    Route::post('/cart/quantity/update', [CartPageController::class, 'updateQuantity']);                 
    Route::post('/cart/clear', [CartPageController::class, 'clear']); 

    Route::post('/order/submit', [OrderController::class, 'confirmOrder']);                 

    Route::get('/user/profile', [UserProfileController::class, 'index'])
        ->name('user.dashboard');
});


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/food', [FoodPageController::class, 'index']);
Route::get('/category', [CategoryPageController::class, 'index']);

Route::get('/foodOfCategory/{id}', [FoodOfCatController::class, 'getFoodOfCategory']);

Route::get('/food/search', [SearchForFoodController::class, 'search']);

