<?php

use App\Http\Controllers\Management\Order\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\Dashboard\DashboardController;
use App\Http\Controllers\Management\Admin\AdminController;
use App\Http\Controllers\Management\Category\CategoryController;
use App\Http\Controllers\Management\Food\FoodController;

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::get('/management',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/management/dashboard',[DashboardController::class,'index']);
    
    Route::get('/management/admin',[AdminController::class,'index']);
    Route::post('/management/admin/store',[AdminController::class,'store']);
    Route::get('/management/admin/delete/{id}',[AdminController::class,'delete']);
    Route::post('/management/admin/change_password/{id}',[AdminController::class,'changePassword']);
    Route::get('/management/admin/edit_data/{id}',[AdminController::class,'edit']);
    Route::post('/management/admin/update_data/{id}',[AdminController::class,'update']);
    
    Route::get('/management/category',[CategoryController::class,'index']);
    Route::post('/management/category/add', [CategoryController::class, 'store']);
    Route::post('/management/category/delete', [CategoryController::class, 'delete']);
    Route::post('/management/category/edit', [CategoryController::class, 'edit']);
    Route::post('/management/category/update/{id}', [CategoryController::class, 'update']);
    
    Route::get('/management/food',[FoodController::class,'index']);
    Route::post('/management/food/delete',[FoodController::class, 'delete']);
    Route::post('/management/food/store',[FoodController::class, 'store']);
    Route::post('/management/food/edit',[FoodController::class, 'edit']);
    Route::post('/management/food/update/{id}',[FoodController::class, 'update']);

    Route::get('/management/orders',[OrderController::class, 'index']);
    Route::post('/management/orders/update/{id}',[OrderController::class, 'update']);
    Route::post('/management/orders/delete',[OrderController::class, 'delete']);

});