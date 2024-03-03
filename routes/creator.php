<?php

use App\Http\Controllers\Creator\Auth\AccountSettingController;
use App\Http\Controllers\Creator\Auth\RegisterController;
use App\Http\Controllers\Creator\Auth\ChangePasswordController;
use App\Http\Controllers\Creator\Auth\ForgotPasswordController;
use App\Http\Controllers\Creator\Auth\LoginController;
use App\Http\Controllers\Creator\Auth\MyAccountController;
use App\Http\Controllers\Creator\AppSettingController;
use App\Http\Controllers\Creator\StripeController;
use App\Http\Controllers\Creator\MarketplaceController;
use App\Http\Controllers\Creator\Auth\ResetPasswordController;
use App\Http\Controllers\Creator\DashboardController;
use App\Http\Controllers\Creator\MessagesController;
use App\Http\Controllers\Creator\MyServicesController;
use App\Http\Controllers\Creator\PackagesController;
use App\Http\Controllers\Creator\PaymentsController;
use App\Http\Controllers\Creator\ProfileShowController;
use App\Http\Controllers\Creator\SponsorCampaignsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Creator\LoginWithFacebookController;
use App\Http\Controllers\Creator\LoginWithGoogleController;

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

Route::group(['prefix' => 'creator', 'as' => 'creator.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/pages/{slug}', [DashboardController::class, 'page'])->name('pages');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::post('/save-conatct-us', [DashboardController::class, 'saveContactUs'])->name('save-conatct-us');
    Route::post('/save-review', [DashboardController::class, 'saveReview'])->name('save-review');
    Route::post('/save-quote', [DashboardController::class, 'saveQuote'])->name('save-quote');
    
Route::get('/stripe-payment', [DashboardController::class, 'stripePayment'])->name('stripe-payment');



    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */

    Route::get('/marketplace/campaign', [MarketplaceController::class, 'campaigns'])->name('marketplace.campaigns');
    Route::get('/marketplace/creator', [MarketplaceController::class, 'creators'])->name('marketplace.creators');

    Route::get('/marketplace/creator/category/{slug}', [MarketplaceController::class, 'category'])->name('marketplace.creators-category');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('profile-save/{id}', [DashboardController::class, 'profileSave'])->name('profile-save');
    Route::post('profile-service-save/{id}', [DashboardController::class, 'profileServiceSave'])->name('profile-service-save');
    // Route::get('creator-profile/{id}', [DashboardController::class, 'viewProfile'])->name('profileview');

    Route::post('upload-showase-work', [DashboardController::class, 'uploadShowcaseWork'])->name('upload-showase-work');
    Route::get('delete-showase-work/{id}', [DashboardController::class, 'deleteShowcaseWork'])->name('delete-showase-work');

    Route::post('upload-client-logo', [DashboardController::class, 'uploadClientLogo'])->name('upload-client-logo');
    Route::get('delete-client-logo/{id}', [DashboardController::class, 'deleteClientLogo'])->name('delete-client-logo');

    Route::post('upload-showcase-example', [DashboardController::class, 'uploadShowcaseExample'])->name('upload-showcase-example');

    // Route::get('profileshow', [ProfileShowController::class, 'index'])->name('profileshow');
    Route::get('profile/{id}', [ProfileShowController::class, 'index'])->name('profileshow');

    Route::get('sponsorcampaigns', [SponsorCampaignsController::class, 'index'])->name('sponsorcampaigns');

    Route::resource('message', MessagesController::class);
    Route::get('/favorites', [DashboardController::class, 'favorites'])->name('favorites');

    Route::get('payments', [PaymentsController::class, 'index'])->name('payments');

    Route::get('packages', [PackagesController::class, 'index'])->name('packages');

    Route::get('my-services', [MyServicesController::class, 'index'])->name('my-services')->middleware('is_verify_email');

    Route::get('account-setting', [AccountSettingController::class, 'accountSetting'])->name('account-setting')->middleware('is_verify_email');

    Route::post('upgarde-save', [DashboardController::class, 'upgardeSave'])->name('upgarde-save');
    Route::post('apply-coupon', [DashboardController::class, 'applyCoupon'])->name('apply-coupon');

    Route::get('suggestions', [DashboardController::class, 'suggestions'])->name('suggestions');

    Route::get('/upgrades', [DashboardController::class, 'upgrades'])->name('upgrades');

    Route::get('/paid-service', [DashboardController::class, 'paidService'])->name('paid-service');

    Route::get('/thankyou', [DashboardController::class, 'Thankyou'])->name('thankyou');

    Route::post('/add-to-favorite', [DashboardController::class, 'addToFavorite'])->name('add-to-favorite');

    Route::get('/support', [DashboardController::class, 'support'])->name('support');


    /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);
    Route::resource('app-settings', AppSettingController::class);

    /*
    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class, 'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');

    Route::get('getConversations', [MessagesController::class, 'getConversations'])->name('getConversations');
    Route::get('getUnReadCreatorMessages', [MessagesController::class, 'getUnReadCreatorMessages'])->name('getUnReadCreatorMessages');
    Route::post('storeConversations', [MessagesController::class, 'store'])->name('storeConversations');

    Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

    Route::controller(LoginWithFacebookController::class)->group(function(){
        Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
        Route::get('auth/facebook/callback', 'handleFacebookCallback');
    });


    Route::controller(LoginWithGoogleController::class)->group(function(){
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback')->name('auth.google.callback');
    });


    Route::get('{slug}', [DashboardController::class, 'viewProfileBySlug'])->name('profileview');


});
