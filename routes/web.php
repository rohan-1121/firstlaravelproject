<?php

use App\Http\Controllers\addtocart;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\heropageController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/shophome', function () {
    return view('shop');
})->name('homeshop');

Route::get('/usershop', function () {
    return view('user.shop');
})->name('usershop');




Route::get('/dashboard',[userController::class,'login'] )->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/addtocart/{id}',[cartcontroller::class,'cart'] )->middleware(['auth', 'verified'])->name('add_to_cart');
Route::get('/cart',[cartcontroller::class,'cartlists'] )->middleware(['auth', 'verified'])->name('cartlist');
Route::get('/cartdel/{id}',[cartcontroller::class,'cartdelete'] )->middleware(['auth', 'verified'])->name('cartdel');

Route::get('/productdetails/{id}',[userController::class,'productDetails'])->name('productdetails');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::resource('product', productController::class)
        ->only(['create','store','destroy','index','edit','update']);
    Route::resource('category', categoryController::class)
        ->only(['create','store','destroy','index','edit','update']);
    Route::resource('herosection', heropageController::class)
        ->only(['create','store','destroy','index','edit','update']);
});




require __DIR__.'/auth.php';
