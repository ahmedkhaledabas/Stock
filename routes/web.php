<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//employee route
Route::get('/add-employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('add.employee');

Route::get('/products/{id}' ,[ProductController::class,'getSubCategory']);

// Route::get('/products/{id}' ,[ProductController::class,'getProduct']);


Route::get('/products' ,[ProductController::class , 'showProducts']);

// Route::get('/products/{id}' ,[ProductController::class , 'productDetails']);

//products route
Route::resource('products' , ProductController::class);

//categories route
Route::resource('category' , CategoryController::class);

//subcategories route
Route::resource('sub_category' , SubCategoryController::class);


Route::get('/{page}' , [AdminController::class , 'index']);



