<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\Aboutcontroller;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
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
})->middleware(['auth','verified'])->name('dashboard');

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

