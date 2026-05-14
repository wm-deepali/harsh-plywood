<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeaderFooterSettingController;
use App\Http\Controllers\Admin\HrbController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\SalesEnquiryController;
use App\Http\Controllers\Admin\SocialSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'home')->name('home');

});

// Admin Routes list
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/profile-setting', ProfileSettingController::class);
        Route::post('/resetpassword', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');

        // Admin Settings
        Route::get('admin-settings', [AdminSettingController::class, 'edit'])->name('settings.admin');
        Route::post('admin-settings', [AdminSettingController::class, 'update']);

        // Social Settings
        Route::get('social-settings', [SocialSettingController::class, 'edit'])->name('settings.social');
        Route::post('social-settings', [SocialSettingController::class, 'update']);

        // Header Footer Settings
        Route::get('header-footer-settings', [HeaderFooterSettingController::class, 'edit'])->name('settings.header');
        Route::post('header-footer-settings', [HeaderFooterSettingController::class, 'update']);

        Route::get('about', [AboutController::class, 'index'])->name('about.index');
        Route::post('about/{type}', [AboutController::class, 'updateSection'])->name('about.update');
        Route::post('about-team', [AboutController::class, 'storeTeam'])->name('about.team.store');
        Route::delete('about-team/{id}', [AboutController::class, 'deleteTeam'])->name('about.team.delete');

        Route::get('hrb', [HrbController::class, 'index'])->name('hrb.index');
        Route::post('hrb/{type}', [HrbController::class, 'updateSection'])->name('hrb.update');
        Route::post('hrb-affiliation', [HrbController::class, 'storeAffiliation'])->name('hrb.affiliation.store');
        Route::delete('hrb-affiliation/{id}', [HrbController::class, 'deleteAffiliation'])->name('hrb.affiliation.delete');

        Route::get('hi-style', [HrbController::class, 'hiStyle'])->name('hi-style.index');
        Route::post('hi-style/{type}', [HrbController::class, 'updateHiStyle'])->name('hi-style.update');
        Route::post('hi-style-affiliation', [HrbController::class, 'storeHiStyleAff'])->name('hi-style.aff.store');
        Route::delete('hi-style-affiliation/{id}', [HrbController::class, 'deleteHiStyleAff'])->name('hi-style.aff.delete');

        Route::resource('awards', AwardController::class);

        Route::resource('product-categories', ProductCategoryController::class);

        Route::resource('products', ProductController::class);
        Route::delete('product-image/{id}', [ProductController::class, 'deleteImage'])->name('product-image.delete');

        Route::resource('faqs', FaqController::class)->names('faqs');
        Route::resource('blogs', BlogController::class)->names('blogs');

        Route::resource('pages', PageController::class);

        Route::resource('galleries', GalleryController::class);

        Route::get('sales-enquiries', [SalesEnquiryController::class, 'index'])->name('sales_enquiries.index');
        Route::delete('sales-enquiries/{id}', [SalesEnquiryController::class, 'destroy']);
        Route::post('sales-enquiries/bulk-delete', [SalesEnquiryController::class, 'bulkDelete'])->name('sales_enquiries.bulkDelete');

        Route::resource('testimonials', TestimonialController::class);

        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});
