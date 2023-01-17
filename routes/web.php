<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\SubSubCategoryController;


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

Route::get('/',[HomeController::class,'index'])->name('home.index');
Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin',[AdminController::class,'home'])->name('admin.home');
    //CategoryController
    Route::prefix('/category')->group(function(){
        Route::get('/view',[CategoryController::class,'index'])->name('category.index');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
    //SubCategoryController
    Route::prefix('/subCategory')->group(function(){
        Route::get('/view',[SubCategoryController::class,'index'])->name('subcategory.index');
        Route::post('/store',[SubCategoryController::class,'store'])->name('subcategory.store');
        Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
        Route::post('/update/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
        Route::get('/delete/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');

    });

    // SubSubCategoryController
    Route::prefix('/subsubCategory')->group(function(){
        Route::get('/view',[SubSubCategoryController::class,'index'])->name('subsubcategory.index');
        Route::post('/store',[SubSubCategoryController::class,'store'])->name('subsubcategory.store');
        Route::get('/edit/{id}',[SubSubCategoryController::class,'edit'])->name('subsubcategory.edit');
        Route::post('/update/{id}',[SubSubCategoryController::class,'update'])->name('subsubcategory.update');
        Route::get('/delete/{id}',[SubSubCategoryController::class,'delete'])->name('subsubcategory.delete');
        Route::get('/category/ajax/{id}',[SubSubCategoryController::class,'ajax']);
    });

    //BrandController
    Route::prefix('brand')->group(function(){
        Route::get('/view',[BrandController::class,'index'])->name('brand.index');
        Route::post('/store',[BrandController::class,'store'])->name('brand.store');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
        Route::post('/update/{id}',[BrandController::class,'update'])->name('brand.update');
        Route::get('/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');
    });

    //product
    Route::prefix('product')->group(function(){
        route::get('/create',[ProductController::class,'addProduct'])->name('product.add');
        Route::get('getsubcategory/ajax/{id}',[ProductController::class,'getsubcategory']);
        Route::get('getsubsubcategory/ajax/{id}',[ProductController::class,'getsubsubcategory']);
        route::post('/store',[ProductController::class,'store'])->name('product.store');
        Route::get('/view',[ProductController::class,'index'])->name('product.index');
        Route::get('delete/{id}',[ProductController::class,'delete'])->name('product.delete');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        route::post('/update/{id}',[ProductController::class,'update'])->name('product.update');
        route::post('/update/thumnbnail/{id}',[ProductController::class,'updatethumbnail'])->name('product.update_thumnbnail');
        Route::post('/update/product/image',[ProductController::class,'updateMulti'])->name('product.update.multi');
        Route::post('delete/product/multi',[ProductController::class,'deleteMul']);
    });

      //SlideController
      Route::prefix('/slide')->group(function(){
        Route::get('/view',[SlideController::class,'index'])->name('slide.index');
        Route::post('/store',[SlideController::class,'store'])->name('slide.store');
        Route::get('/edit/{id}',[SlideController::class,'edit'])->name('slide.edit');
        Route::post('/update/{id}',[SlideController::class,'update'])->name('slide.update');
        Route::get('/delete/{id}',[SlideController::class,'delete'])->name('slide.delete');
    });

    //UserController
    Route::prefix('/user')->group(function(){

        Route::get('/view',[UserController::class,'index'])->name('user.index');
        Route::get('/edit/{id?}',[UserController::class,'edit'])->name('user.edit');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('user.delete');
        Route::get('/logout', [UserController::class, 'logout']);
        Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');
        Route::post('/store',[UserController::class,'store'])->name('user.store');
        Route::post('/store/create', [UserController::class, 'store_create'])->name('store-create');
    });

});

