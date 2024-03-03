<?php

use App\Http\Controllers\Auth\AccountSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Sponsor\CampaignController;
use App\Http\Controllers\Sponsor\ProfileShowController;
use App\Http\Controllers\Sponsor\StripeController;
use App\Http\Controllers\Sponsor\MessagesController;
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

Route::any('/social-content-webhook', [IndexController::class, 'socialContentWebhook'])->name('social-content-webhook');

Route::get('/', [IndexController::class, 'home'])->name('index');
Route::get('/generate-sitemap', [IndexController::class, 'generateSiteMap']);

Route::get('/send-email', [IndexController::class, 'sendEmail'])->name('index');
Route::get('/send-email-creator', [IndexController::class, 'sendEmailCreator'])->name('index');

Route::get('/pages/{slug}', [IndexController::class, 'page'])->name('pages');
Route::get('/suggestions', [IndexController::class, 'suggestions'])->name('suggestions');

// Route::get('/profileshow', [IndexController::class, 'profileshow'])->name('profileshow');
Route::get('profile/{id}', [ProfileShowController::class, 'index'])->name('profileshow');
// Route::get('creator-profile/{id}', [IndexController::class, 'viewProfile'])->name('profileview');

Route::post('fetch-states', [IndexController::class, 'fetchStates'])->name('fetch-states');
Route::get('/marketplace', [IndexController::class, 'marketplace'])->name('marketplace');
Route::get('/get-search-keywords', [IndexController::class, 'getSearchKeywords'])->name('get-search-keywords');
Route::get('/get-search-city', [IndexController::class, 'getSearchCity'])->name('get-search-city');
Route::get('/get-search-city-sposnor', [IndexController::class, 'getSearchCitySposnor'])->name('get-search-city-sposnor');

Route::post('/save-conatct-us', [IndexController::class, 'saveContactUs'])->name('save-conatct-us');
Route::post('/save-quote', [IndexController::class, 'saveQuote'])->name('save-quote');

 Route::post('/save-review', [IndexController::class, 'saveReview'])->name('save-review');

Route::get('/campaign', [IndexController::class, 'campaign'])->name('campaign');

Route::get('/support', [IndexController::class, 'support'])->name('support');

Route::get('/faq', [IndexController::class, 'faq'])->name('faq');
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{id}', [IndexController::class, 'blog'])->name('blog');

Route::get('/ppc', [IndexController::class, 'ppc'])->name('ppc');

Route::get("/sitemap", function(){
   return response()->file('sitemap.xml');
});

Route::get("sitemap.xml" , function () {
return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
 });


Route::get('account/verify/{token}', [RegisterController::class, 'verifyAccount'])->name('user.verify');
Route::get('creator/account/verify/{token}', [RegisterController::class, 'verifyCreatorAccount'])->name('creator-user.verify');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/campaigns', [CampaignController::class])->name('campaigns');
// Route::resource('campaigns', CampaignController::class);




Route::resource('campaigns', CampaignController::class);

Route::get('/marketplace/campaign', [MarketplaceController::class, 'campaigns'])->name('marketplace.campaigns');
Route::get('/marketplace/creator', [MarketplaceController::class, 'creators'])->name('marketplace.creators');
Route::get('/marketplace/creator/category/{slug}', [MarketplaceController::class, 'category'])->name('marketplace.creators-category');


Route::get('category/{slug}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('category-search', [CategoryController::class, 'categorySearch'])->name('category-search');
Route::get('brand/{slug}', [BrandController::class, 'index'])->name('brands.index');

Route::post('profile-save/{id}', [HomeController::class, 'profileSave'])->name('profile-save');
Route::post('upgarde-save', [HomeController::class, 'upgardeSave'])->name('upgarde-save');
Route::post('apply-coupon', [HomeController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('/thankyou', [HomeController::class, 'Thankyou'])->name('thankyou');
Route::get('/stripe-payment', [HomeController::class, 'stripePayment'])->name('stripe-payment');

Route::get('/favorites', [HomeController::class, 'favorites'])->name('favorites');

Route::get('/upgrades', [HomeController::class, 'upgrades'])->name('upgrades');

Route::get('/paid-service', [HomeController::class, 'paidService'])->name('paid-service');

Route::get('/payments', [HomeController::class, 'Payments'])->name('Payments');

Route::get('/create-campaign', [HomeController::class, 'createcampaign'])->name('create-campaign');

Route::get('/packages', [HomeController::class, 'packages'])->name('packages');

Route::resource('message', MessagesController::class);

Route::post('/add-to-favorite', [HomeController::class, 'addToFavorite'])->name('add-to-favorite');

Route::get('account-setting', [AccountSettingController::class, 'accountSetting'])->name('account-setting')->middleware('is_verify_email');


Route::get('getConversations', [MessagesController::class, 'getConversations'])->name('getConversations');
Route::get('getUnReadSponserMessages', [MessagesController::class, 'getUnReadSponserMessages'])->name('getUnReadSponserMessages');
Route::post('storeConversations', [MessagesController::class, 'store'])->name('storeConversations');


Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');


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
