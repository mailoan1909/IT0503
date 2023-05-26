<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/show/{id}',[CategoryController::class,'show'])->name('category.show');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');

Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('products.create');
    Route::get('/product/delete/{id}',[ProductController::class,'destroy'])->name('products.destroy');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('products.update');
    Route::get('/product/show/{id}',[ProductController::class,'show'])->name('products.show');
    Route::post('product/store',[ProductController::class,'store'])->name('products.store');

    Route::get('/products/search', [HomeController::class,'search'])->name('products.search');
Route::get('/index',[HomeController::class,'index'])->name('page.home');
Route::get('/detail/{id}',[HomeController::class,'detail'])->name('page.detail');
Route::get('/search',[HomeController::class,'search']);
  //  Route::get('/add-to-cart/{id}',[HomeController::class,'addToCart'])->name('page.detail');
    Route::post('/savecart',[HomeController::class,'savecart'])->name('savecart');

    //Route::group(['middleware' => 'auth'], function () {
        Route::get('/register',[UserController::class,'show'])->name('welcome.register');
    Route::post('/',[UserController::class,'store'])->name('auth.register');

        Route::get('/',[UserController::class,'showLogin'])->name('welcome.login');
    Route::post('/login',[UserController::class,'auth'])->name('user.auth');

    Route::get('/logout',[UserController::class,'logout'])->name('logout');

    Route::post('/index',[UserController::class,'login'])->name('auth.login');
