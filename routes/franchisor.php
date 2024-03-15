<?php

use App\Http\Controllers\Franchisor\Auth\ChangePasswordController;
use App\Http\Controllers\Franchisor\Auth\ForgotPasswordController;
use App\Http\Controllers\Franchisor\Auth\LoginController;
use App\Http\Controllers\Franchisor\Auth\RegisterController;
use App\Http\Controllers\Franchisor\Auth\MyAccountController;
use App\Http\Controllers\Franchisor\Auth\ResetPasswordController;
use App\Http\Controllers\Franchisor\DashboardController;
use App\Http\Controllers\Franchisor\BrandController;
use App\Http\Controllers\Franchisor\CategoryController;
use App\Http\Controllers\Franchisor\EnquiryController;
use App\Http\Controllers\Franchisor\UserManagementController;
use App\Http\Controllers\Franchisor\RoleController;
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

Route::group(['prefix' => 'franchisor', 'as' => 'franchisor.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

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
    | Brands Route
    |--------------------------------------------------------------------------
    */

    Route::resource('brands', BrandController::class);

    /*
    |--------------------------------------------------------------------------
    | Categories Route
    |--------------------------------------------------------------------------
    */

    Route::resource('categories', CategoryController::class);


    /*
    |--------------------------------------------------------------------------
    | Enquiry Route
    |--------------------------------------------------------------------------
    */

    Route::resource('enquiries', EnquiryController::class);

    /*
    |--------------------------------------------------------------------------
    | Enquiry Route
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | User Management Route
    |--------------------------------------------------------------------------
    */

    Route::resource('user-management',UserManagementController::class);

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
