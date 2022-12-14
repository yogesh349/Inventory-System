<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Home\Aboutcontroller;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
});
// ->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::controller(AdminController::class)->group(function(){
    Route::get('admin/logout','destroy')->name('admin.logout');
    Route::get('admin/profle','profile')->name('admin.profile');
    Route::get('edit/profle','editProfile')->name('editprofile');
    Route::post('store/profle','store')->name('store.profile');
    Route::get('change/password','changePassword')->name('change.password');
    Route::post('update/password','updatePassword')->name('update.password');
    

});

Route::controller(HomeSliderController::class)->group(function(){
            Route::get('home/slide','homeSlider')->name('home.slide');
            Route::post('update/slide','updateSlider')->name('update.slide');
});

Route::controller(Aboutcontroller::class)->group(function(){
    Route::get('about/page','AboutPage')->name('about.page');
    Route::post('about/update','update')->name('update.about');
    Route::get('home/about','homeAbout')->name('home.about');
    Route::get('about/multiImage','multiImage')->name('about.multiImage');
    Route::post('store/multi-image','storeMultiImage')->name('store.multimage');
    Route::get('all/multiImage','showmultiImage')->name('all.multiImage');
    Route::get('edit/multiImage/{id}','editMultimage')->name('edit.multi.image');
    Route::post('update/multi-image','updateMultiImage')->name('update.multimage');
    Route::get('delete/multi-image/{id}','destroyMultImage')->name('delete.multimage');
    
    
 

});

Route::controller(PortfolioController::class)->group(function(){
    Route::get('all/portfolio','allPortfolio')->name('all.portfolio');
    Route::get('add/portfolio','addPortfolio')->name('add.portfolio');
    Route::post('store/portfolio','storePortfolio')->name('store.portfolio');
    
});

Route::controller(SupplierController::class)->group(function(){

    Route::get('supplier/all','supplierAll')->name('all.supplier');
    Route::get('Add/supplier','addSupplier')->name('add.supplier');
    Route::post('store/supplier','storeSupplier')->name('store.supplier');
    Route::get('edit/supplier/{id}','editSupplier')->name('edit.supplier');
    Route::post('update/supplier/{id}','updateSupplier')->name('update.supplier');
    Route::get('delete/supplier/{id}','deleteSupplier')->name('delete.supplier');
   
   

});

Route::controller(CustomerController::class)->group(function(){
    Route::get('customer/all','customerAll')->name('customer.all');
    Route::get('customer/add','customerAdd')->name('add.customer');
    Route::post('store/customer','storeCustomer')->name('store.customer');
    Route::get('edit/customer/{id}','editCustomer')->name('edit.customer');
    Route::post('update/customer/{id}','updateCustomer')->name('update.customer');
    Route::get('delete/ccustomer/{id}','deleteCustomer')->name('delete.customer');
});

Route::controller(UnitController::class)->group(function(){
    Route::get('unit/all','unitAll')->name('unit.all');
    Route::get('unit/add','unitAdd')->name('add.unit');
    Route::post('store/unit','storeUnit')->name('store.unit');
    Route::get('edit/unit/{id}','editUnit')->name('edit.unit');
    Route::post('update/unit/{id}','updateUnit')->name('update.unit');
    Route::get('delete/unit/{id}','deleteUnit')->name('delete.unit');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('category/all','categoryAll')->name('category.all');
    Route::get('category/add','categoryAdd')->name('add.category');
    Route::post('store/category','storeCategory')->name('store.category');
    Route::get('edit/category/{id}','editCategory')->name('edit.category');
    Route::post('update/category/{id}','updateCategory')->name('update.category');
    Route::get('delete/category/{id}','deleteCategory')->name('delete.category');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('product/all','productAll')->name('product.all');
    Route::get('product/add','productAdd')->name('add.product');
    Route::post('store/product','storeProduct')->name('store.product');
    Route::get('edit/product/{id}','editProduct')->name('edit.product');
    Route::post('update/product/{id}','updateProduct')->name('update.product');
    Route::get('delete/product/{id}','deleteProduct')->name('delete.product');
});

Route::controller(PurchaseController::class)->group(function(){
    Route::get('purchase/all','purchaseAll')->name('purchase.all');
    Route::get('purchase/add','purchaseAdd')->name('add.purchase');
    Route::post('store/purchase','storePurchase')->name('purchase.store');
    Route::get('delete/purchase/{id}','deletePurchase')->name('delete.purchase');
    Route::get('purchase/pending','purchasePending')->name('purchase.pending');
    Route::get('purchase/approve/{id}','approvePurchase')->name('approve.purchase');
    
});


// Default Controller
Route::controller(DefaultController::class)->group(function(){
Route::get('get-category/','getCategory')->name('get-category');
Route::get('get-products/','getProduct')->name('get-products');


});


