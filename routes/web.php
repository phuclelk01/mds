<?php
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminProductController;
Use App\Http\Controllers\AdminCategoryController;
Use App\Http\Controllers\AdminMangerUser;
use App\Http\Controllers\CustomerDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;

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


//Dashboard
Route::get('/Customer/index',[CustomerDashboardController::class,'index']);
Route::get('/Customer/products',[CustomerDashboardController::class,'products']);
Route::get('/Customer/shoppingcart',[CustomerDashboardController::class,'shoppingcart']);
Route::get('/Customer/products',[CustomerDashboardController::class,'ProductListIndex']);

//ConnectController
Route::get('/Connect/register',[ConnectController::class,'register']);
Route::get('/Connect/login',[ConnectController::class,'login']);
Route::get('/logout', [ConnectController::class, 'logout'])->name('logout');
Route::post('/Connect/register-User', [ConnectController::class,'registerUser'])->name('register-User');
Route::post('/Connect/loginconnect', [ConnectController::class,'loginconnect'])->name('loginconnect');
//AdminProductController
Route::get('Admin/product',[AdminProductController::class,'ProductList']);
Route::post('/Admin/addproduct',[AdminProductController::class,'addproduct'])->name('addproduct');
Route::get('deleteproduct/{product_id}',[AdminProductController::class,'deleteproduct']);
Route::get('/Admin/edit-product/{product_id}',[AdminProductController::class,'editproduct']);
Route::post('updateproduct',[AdminProductController::class,'updateproduct']);
Route::post('saveproduct',[AdminProductController::class,'saveproduct']);
//AdminManagerUser
Route::get('/Admin/dashboard',[AdminMangerUser::class,'listaccus']);
Route::get('delete/{id}',[AdminMangerUser::class,'delete']);
Route::get('Admin/editaccus/{id}',[AdminMangerUser::class,'edit']);
Route::post('update',[AdminMangerUser::class,'update']);
//AdminCategoryController
Route::get('/Admin/category',[AdminCategoryController::class,'CategoryList']);
Route::post('/Admin/addcategory',[AdminCategoryController::class,'addcategory'])->name('addcategory');
Route::get('deletecategory/{category_id}',[AdminCategoryController::class,'deletecategory']);
Route::get('/Admin/edit-category/{category_id}',[AdminCategoryController::class,'editcategory']);
Route::post('updatecategory',[AdminCategoryController::class,'updatecategory']);
Route::post('savecategory',[AdminCategoryController::class,'savecategory']);
//AdminBrandController
Route::get('Admin/brand',[AdminBrandController::class,'brandlist']);
Route::get('edit/{id}',[AdminBrandController::class,'edit']);
Route::post('Admin/brand',[AdminBrandController::class,'addbrand'])->name('add_brand');
Route::get('deletebrand/{brand_id}',[AdminBrandController::class,'deletebrand']);
Route::get('/Admin/edit-brand/{brand_id}',[AdminBrandController::class,'editbrand']);
Route::post('updatebrand',[AdminBrandController::class,'updatebrand']);



