<?php

use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\MyAccountController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\FranchisorController;
use App\Http\Controllers\Admin\WebsiteContactSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomePageSettingController;
use App\Http\Controllers\Admin\ContentManagementController;
use App\Http\Controllers\Admin\WhyFranchiseeController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\InformationPageManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\HomePageReviewController;
use App\Http\Controllers\Admin\HomePageServiceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');


    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



   
    /*
    |--------------------------------------------------------------------------
    | Categories Route
    |--------------------------------------------------------------------------
    */

    Route::resource('categories', CategoryController::class);


    /*
    |--------------------------------------------------------------------------
    | Brands Route
    |--------------------------------------------------------------------------
    */

    Route::resource('brands', BrandController::class);


    /*
    |--------------------------------------------------------------------------
    | Enquiry Route
    |--------------------------------------------------------------------------
    */

    Route::resource('enquiries', EnquiryController::class);

    /*
    |--------------------------------------------------------------------------
    | Information Page Management Route
    |--------------------------------------------------------------------------
    */

    Route::resource('information-page-management',InformationPageManagementController::class);

    /*
    |--------------------------------------------------------------------------
    | User Management Route
    |--------------------------------------------------------------------------
    */

    Route::resource('user-management',UserManagementController::class);
    Route::resource('franchisors',FranchisorController::class);

     /*
    |--------------------------------------------------------------------------
    | Role Route
    |--------------------------------------------------------------------------
    */

    Route::resource('roles', RoleController::class);

    /*
    |--------------------------------------------------------------------------
    | Website Settings Route
    |--------------------------------------------------------------------------
    */

    Route::resource('website-settings', WebsiteSettingController::class);

    Route::get('basic-settings', [HomePageSettingController::class, 'basicSetting'])->name('settings.basic');
    Route::post('basic-settings', [HomePageSettingController::class, 'saveBasicSetting'])->name('settings.basic');


    Route::get('seo-content', [HomePageSettingController::class, 'seoContentSetting'])->name('settings.seo-content');
    Route::post('seo-content', [HomePageSettingController::class, 'saveSeoContentSetting'])->name('settings.seo-content');

    Route::get('homebanner', [HomePageSettingController::class, 'homeBanner'])->name('settings.homebanner');
    Route::post('homebanner', [HomePageSettingController::class, 'homeBannerPost'])->name('settings.homebanner');

    Route::get('how-it-works-settings', [HomePageSettingController::class, 'worksSetting'])->name('settings.works');
    Route::post('how-it-works-settings', [HomePageSettingController::class, 'saveWorksSetting'])->name('settings.works');


    Route::get('get-best-for-less-settings', [HomePageSettingController::class, 'bestForLessSetting'])->name('settings.get-best-for-less');
    Route::post('get-best-for-less-settings', [HomePageSettingController::class, 'saveBestForLessSetting'])->name('settings.get-best-for-less');


    Route::get('banner1-settings', [HomePageSettingController::class, 'banner1Setting'])->name('settings.banner1');
    Route::post('banner1-settings', [HomePageSettingController::class, 'saveBanner1Setting'])->name('settings.banner1');


    Route::get('banner2-settings', [HomePageSettingController::class, 'banner2Setting'])->name('settings.banner2');
    Route::post('banner2-settings', [HomePageSettingController::class, 'saveBanner2Setting'])->name('settings.banner2');

    Route::resource('services-setting', HomePageServiceController::class);
    Route::resource('reviews-setting', HomePageReviewController::class);
    Route::resource('earnings', EarningController::class);


    Route::resource('contact-setting', WebsiteContactSettingController::class);

    Route::resource('faqs', FaqController::class);
    Route::resource('why-franchisees', WhyFranchiseeController::class);
    Route::resource('blogs', BlogController::class);

    /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);

    /*
    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class, 'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');

});
