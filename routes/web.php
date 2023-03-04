<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportsProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Middleware\CheckStatus;

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
    return view('auth.login');
});

// Route::get('/{page}', 'AdminController@index');




Auth::routes();

//Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(CheckStatus::class)->name('home');



Route::get('/products/{id}' ,[ProductController::class,'getSubCategory']);

// Route::get('/products/{id}' ,[ProductController::class,'getProduct']);


// Route::get('/products/{id}' ,[ProductController::class , 'productDetails']);

//products route
Route::resource('products' , ProductController::class);
Route::get('/products/productsUser' ,[ProductController::class, 'productsUser']);

Route::resource('roles' , RoleController::class);

Route::resource('users' , UserController::class);



Route::get('/users/edit' ,[UserController::class , 'edit']);


//categories route
Route::resource('category' , CategoryController::class);

//subcategories route
Route::resource('sub_category' , SubCategoryController::class);


Route::get('/{page}' , [AdminController::class , 'index']);

Route::resource('reports' , ReportsProductController::class);

