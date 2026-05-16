<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactEnquiryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeaderFooterSettingController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\HiStyleBrandController;
use App\Http\Controllers\Admin\HomeAboutController;
use App\Http\Controllers\Admin\HrbBrandController;
use App\Http\Controllers\Admin\HrbController;
use App\Http\Controllers\Admin\HrbCounterController;
use App\Http\Controllers\Admin\HrbEnquiryController;
use App\Http\Controllers\Admin\HrbOfferController;
use App\Http\Controllers\Admin\HrbWhyChooseController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\SalesEnquiryController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\SocialSettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\HiStyleController;
use App\Http\Controllers\Admin\HiStyleCounterController;
use App\Http\Controllers\Admin\HiStyleOfferController;
use App\Http\Controllers\Admin\HiStyleWhyChooseController;

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/about-us', 'about')->name('about-us');
    Route::get('/awards', 'awards')->name('awards');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/{slug}', 'productDetails')->name('product.details');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{slug}', 'blogDetails')->name('blog.details');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('hrb-plywood', 'hrbPlywood')->name('hrb-plywood');
    Route::get('our-brands', 'brands')->name('our-brands');
    Route::get('contact-us', 'contact')->name('contact-us');
    Route::post('/contact-enquiry', 'contactEnquiry')->name('contact.enquiry');
    Route::post('/hrb-enquiry', 'hrbEnquiry')->name('hrb.enquiry');

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

        // Hero Sections
        Route::get('/hero-sections', [HeroSectionController::class, 'index'])->name('settings.hero-sections.index');
        Route::get('/hero-sections/edit/{id}', [HeroSectionController::class, 'edit'])->name('settings.hero-sections.edit');
        Route::post('/hero-sections/update/{id}', [HeroSectionController::class, 'update'])->name('settings.hero-sections.update');

        //SEO Settings
        Route::get('/seo-settings', [SeoSettingController::class, 'index'])->name('settings.seo-settings.index');
        Route::get('/seo-settings/edit/{id}', [SeoSettingController::class, 'edit'])->name('settings.seo-settings.edit');
        Route::post('/seo-settings/update/{id}', [SeoSettingController::class, 'update'])->name('settings.seo-settings.update');


        Route::prefix('about')->name('about.')->group(function () {

            Route::get('/', [AboutController::class, 'index'])->name('index');

            // Introduction
            Route::get('/introduction/edit', [AboutController::class, 'editIntroduction'])->name('introduction.edit');
            Route::post('/introduction/update', [AboutController::class, 'updateIntroduction'])->name('introduction.update');

            //History
            Route::get('/history/edit', [AboutController::class, 'editHistory'])->name('history.edit');
            Route::post('/history/update', [AboutController::class, 'updateHistory'])->name('history.update');

            // Vision
            Route::get('/vision/edit', [AboutController::class, 'editVision'])->name('vision.edit');
            Route::post('/vision/update', [AboutController::class, 'updateVision'])->name('vision.update');

            // Mission
            Route::get('/mission/edit', [AboutController::class, 'editMission'])->name('mission.edit');
            Route::post('/mission/update', [AboutController::class, 'updateMission'])->name('mission.update');


        });

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

        Route::resource('gallery-categories', GalleryCategoryController::class);
        Route::resource('galleries', GalleryController::class);

        Route::resource('hero-sliders', HeroSliderController::class);

        Route::prefix('home-about')->name('home-about.')->controller(HomeAboutController::class)->group(function () {

            Route::get('/', 'index')->name('index');
            Route::post('/update', 'update')->name('update');
            Route::post('/feature/store', 'storeFeature')->name('feature.store');
            Route::post('/feature/update/{id}', 'updateFeature')->name('feature.update');
            Route::delete('/feature/delete/{id}', 'deleteFeature')->name('feature.delete');

        });

        Route::resource('counters', CounterController::class);

        Route::prefix('why-choose')->name('why-choose.')->controller(WhyChooseController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/update', 'update')->name('update');
                Route::post('/feature/store','storeFeature' )->name('feature.store');
                Route::put('/feature/update/{id}',[WhyChooseController::class, 'updateFeature'])->name('feature.update');
                Route::delete('/feature/delete/{id}','deleteFeature')->name('feature.delete');

            });

        Route::get('sales-enquiries', [SalesEnquiryController::class, 'index'])->name('sales_enquiries.index');
        Route::delete('sales-enquiries/{id}', [SalesEnquiryController::class, 'destroy']);
        Route::post('sales-enquiries/bulk-delete', [SalesEnquiryController::class, 'bulkDelete'])->name('sales_enquiries.bulkDelete');

        Route::get('contact-enquiries', [ContactEnquiryController::class, 'index'])->name('contact-enquiries.index');
        Route::delete('contact-enquiries/{id}', [ContactEnquiryController::class, 'destroy']);
        Route::post('contact-enquiries/bulk-delete', [ContactEnquiryController::class, 'bulkDelete'])->name('contact-enquiries.bulkDelete');

        Route::get('hrb-enquiries', [HrbEnquiryController::class, 'index'])->name('hrb-enquiries.index');
        Route::delete('hrb-enquiries/{id}', [HrbEnquiryController::class, 'destroy']);
        Route::post('hrb-enquiries/bulk-delete', [HrbEnquiryController::class, 'bulkDelete'])->name('hrb-enquiries.bulkDelete');

        Route::resource('testimonials', TestimonialController::class);

        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});
