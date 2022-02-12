<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('dashboard');

  
});

//--------------------------ROUTE FOR CATEGORY---------------------------

Route::get('admin/category/add-category',[CategoryController::class,'index'])->name('admin.addCategory');
Route::post('admin/category/store-category',[CategoryController::class,'store'])->name('store.category');
Route::get('admin/category/view-category',[CategoryController::class,'view'])->name('admin.viewCategory');
Route::get('admin/category/edit-category/{id}',[CategoryController::class,'edit'])->name('admin.editCategory');
Route::get('admin/category/delete-category/{id}',[CategoryController::class,'delete'])->name('admin.deleteCategory');
Route::post('admin/category/update-category/{id}',[CategoryController::class,'update'])->name('admin.updateCategory');


//--------------ROUTE FOR SUBCATEGORY-----------------------------------

Route::get('admin/subcategory/add-subcategory',[SubCategoryController::class,'create'])->name('admin.addSubCategory');
Route::post('admin/subcategory/store-subcategory',[SubCategoryController::class,'store'])->name('admin.store.subcategory');
Route::get('admin/subcategory/view-subcategory',[SubCategoryController::class,'view'])->name('admin.viewSubCategory');
Route::get('admin/subcategory/delete-category/{id}',[SubCategoryController::class,'delete'])->name('admin.deleteSubCategory');
Route::get('admin/subcategory/edit-subcategory/{id}',[SubCategoryController::class,'edit'])->name('admin.editSubCategory');
Route::post('admin/subcategory/updateSubcategory/{id}',[SubCategoryController::class,'update'])->name('admin.updateSubCategory');


//------------------- ROUTE FOR BRANDS------------------------------------

Route::get('admin/brand/add-brand',[BrandController::class,'create'])->name('admin.addBrand');
Route::post('admin/brand/store-brand',[BrandController::class,'store'])->name('admin.storeBrand');
Route::get('admin/brand/showSubCategory/{id}',[BrandController::class,'showSubCat'])->name('adminShowSub');
Route::get('admin/brand/view-brand',[BrandController::class,'view'])->name('admin.viewBrand');
Route::get('admin/brand/delete-brand/{id}',[BrandController::class,'delete'])->name('admin.deleteBrand');
Route::get('admin/brand/edit-brand/{id}',[BrandController::class,'edit'])->name('admin.editBrand');
Route::post('admin/brand/update-brand/{id}',[BrandController::class,'update'])->name('admin.updateBrand');

//--------------------ROUTE FOR COLOR--------------------------------------

Route::get('admin/color/add-color',[ColorController::class,'create'])->name('admin.addColor');
Route::post('admin/color/store-color',[ColorController::class,'store'])->name('store.color');
Route::get('admin/color/view-color',[ColorController::class,'view'])->name('admin.viewColor');
Route::get('admin/color/edit-color/{id}',[ColorController::class,'edit'])->name('admin.editColor');
Route::get('admin/color/delete-color/{id}',[ColorController::class,'delete'])->name('admin.deleteColor');
Route::post('admin/color/update-color/{id}',[ColorController::class,'update'])->name('update.color');

//------------------ROUTE FOR SIZE-------------------------------------------
Route::get('admin/size/add-size',[SizeController::class,'create'])->name('admin.addSize');
Route::post('admin/size/store-size',[SizeController::class,'store'])->name('store.size');
Route::get('admin/size/view-size',[SizeController::class,'view'])->name('admin.viewSize');
Route::get('admin/size/edit-size/{id}',[SizeController::class,'edit'])->name('admin.editSize');
Route::get('admin/size/delete-size/{id}',[SizeController::class,'delete'])->name('admin.deleteSize');
Route::post('admin/size/update-size/{id}',[SizeController::class,'update'])->name('update.size');

//------------------ROUTE FOR PRODUCTS-------------------------------------------
Route::get('admin/product/add-product',[ProductController::class,'create'])->name('admin.addproduct');
Route::post('admin/product/store-product',[ProductController::class,'store'])->name('store.product');
Route::get('admin/product/view-product',[ProductController::class,'view'])->name('admin.viewProduct');
Route::get('admin/product/edit-product/{id}',[ProductController::class,'edit'])->name('admin.editProduct');
Route::get('admin/product/delete-product/{id}',[ProductController::class,'delete'])->name('admin.deleteproduct');
Route::post('admin/product/update-product/{id}',[ProductController::class,'update'])->name('update.product');
Route::get('admin/product/showBrand/{id}',[ProductController::class,'showBrand'])->name('adminShowBrand');
