<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
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


//--------------ROUTE FOR SUBCATEGORY----------------------

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