<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeaderFooterSettingController;
use App\Http\Controllers\Admin\HiStyleBrandController;
use App\Http\Controllers\Admin\HrbBrandController;
use App\Http\Controllers\Admin\HrbController;
use App\Http\Controllers\Admin\HrbCounterController;
use App\Http\Controllers\Admin\HrbOfferController;
use App\Http\Controllers\Admin\HrbWhyChooseController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\SalesEnquiryController;
use App\Http\Controllers\Admin\SocialSettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\HiStyleController;
use App\Http\Controllers\Admin\HiStyleCounterController;
use App\Http\Controllers\Admin\HiStyleOfferController;
use App\Http\Controllers\Admin\HiStyleWhyChooseController;

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

        Route::prefix('hrb')->name('hrb.')->group(function () {

            //INDEX
            Route::get('/', [HrbController::class, 'index'])->name('index');

            // HERO SECTION
            Route::get('/hero-edit', [HrbController::class, 'heroEdit'])->name('hero.edit');
            Route::post('/hero-update', [HrbController::class, 'heroUpdate'])->name('hero.update');

            // INTRO SECTION
            Route::get('/intro-edit', [HrbController::class, 'introEdit'])->name('intro.edit');
            Route::post('/intro-update', [HrbController::class, 'introUpdate'])->name('intro.update');
            Route::post('/intro-feature-store', [HrbController::class, 'introFeatureStore'])->name('intro-feature.store');
            Route::delete('/intro-feature-delete/{id}', [HrbController::class, 'introFeatureDelete'])->name('intro-feature.delete');

            // CONTACT SECTION
            Route::get('/contact-edit', [HrbController::class, 'contactEdit'])->name('contact.edit');
            Route::post('/contact-update', [HrbController::class, 'contactUpdate'])->name('contact.update');

            // COUNTER SECTION
            Route::get('/counter-edit', [HrbCounterController::class, 'index'])->name('counter.edit');
            Route::post('/counter-update', [HrbCounterController::class, 'update'])->name('counter.update');
            Route::post('/counter-store', [HrbCounterController::class, 'storeCounter'])->name('counter.store');
            Route::delete('/counter-delete/{id}', [HrbCounterController::class, 'deleteCounter'])->name('counter.delete');

        });

        Route::resource('hrb-offers', HrbOfferController::class);
        Route::resource('hrb-why-choose', HrbWhyChooseController::class);
        Route::resource('hrb-brands', HrbBrandController::class);


        Route::prefix('hi-style')->name('hi-style.')->group(function () {

            //INDEX
            Route::get('/', [HiStyleController::class, 'index'])->name('index');

            // HERO SECTION
            Route::get('/hero-edit', [HiStyleController::class, 'heroEdit'])->name('hero.edit');
            Route::post('/hero-update', [HiStyleController::class, 'heroUpdate'])->name('hero.update');

            // INTRO SECTION
            Route::get('/intro-edit', [HiStyleController::class, 'introEdit'])->name('intro.edit');
            Route::post('/intro-update', [HiStyleController::class, 'introUpdate'])->name('intro.update');
            Route::post('/intro-feature-store', [HiStyleController::class, 'introFeatureStore'])->name('intro-feature.store');
            Route::delete('/intro-feature-delete/{id}', [HiStyleController::class, 'introFeatureDelete'])->name('intro-feature.delete');

            // CONTACT SECTION
            Route::get('/contact-edit', [HiStyleController::class, 'contactEdit'])->name('contact.edit');
            Route::post('/contact-update', [HiStyleController::class, 'contactUpdate'])->name('contact.update');

            // COUNTER SECTION
            Route::get('/counter-edit', [HiStyleCounterController::class, 'index'])->name('counter.edit');
            Route::post('/counter-update', [HiStyleCounterController::class, 'update'])->name('counter.update');
            Route::post('/counter-store', [HiStyleCounterController::class, 'storeCounter'])->name('counter.store');
            Route::delete('/counter-delete/{id}', [HiStyleCounterController::class, 'deleteCounter'])->name('counter.delete');

        });

        Route::resource('hi-style-offers', HiStyleOfferController::class);
        Route::resource('hi-style-why-choose', HiStyleWhyChooseController::class);
         Route::resource('hi-style-brands', HiStyleBrandController::class);


        Route::resource('awards', AwardController::class);

        Route::resource('contact-us', ContactUsController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('teams', TeamController::class);

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
