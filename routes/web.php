<?php

use App\Http\Controllers\Auth\AccountSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\LoginWithFacebookController;
use App\Http\Controllers\LoginWithGoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('sitemap-generate', function () {

    \Artisan::call('sitemap:generate');

    dd("Site Map generated");

});

Route::group(['middleware'=>'HtmlMinifier'],function(){



Route::get('/', [IndexController::class, 'home'])->name('index');
Route::get('/generate-sitemap', [IndexController::class, 'generateSiteMap']);


Route::get('/pages/{slug}', [IndexController::class, 'page'])->name('pages');

Route::get('profile/{id}', [ProfileShowController::class, 'index'])->name('profileshow');


Route::post('/save-conatct-us', [IndexController::class, 'saveContactUs'])->name('save-conatct-us');
Route::post('/save-join-us', [IndexController::class, 'saveJoinUs'])->name('save-join-us');



Route::get('/support', [IndexController::class, 'support'])->name('support');
Route::get('/join', [IndexController::class, 'join'])->name('join');

Route::get('/faq', [IndexController::class, 'faq'])->name('faq');
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{id}', [IndexController::class, 'blog'])->name('blog');


Route::get("/sitemap", function(){
   return response()->file('sitemap.xml');
});

Route::get("sitemap.xml" , function () {
return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
 });




Auth::routes();



Route::get('category/{slug}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('category-search', [CategoryController::class, 'categorySearch'])->name('category-search');
Route::get('brand/{slug}', [BrandController::class, 'index'])->name('brands.index');

Route::get('/thankyou', [HomeController::class, 'Thankyou'])->name('thankyou');


Route::get('account-setting', [AccountSettingController::class, 'accountSetting'])->name('account-setting')->middleware('is_verify_email');



Route::controller(LoginWithFacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});


Route::controller(LoginWithGoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


if(auth()->guard('web') && request()->path() != 'admin') {
Route::get('{slug}', [IndexController::class, 'viewProfileBySlug'])->name('profileview');
}

});
