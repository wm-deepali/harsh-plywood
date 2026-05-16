<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\HeaderFooterSetting;
use App\Models\SocialSetting;
use Illuminate\Support\Facades\View;
use App\Models\ProductCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $headerFooter = HeaderFooterSetting::first();

        $socialSetting = SocialSetting::first();

        View::share(
            'headerFooter',
            $headerFooter
        );

        View::share(
            'socialSetting',
            $socialSetting
        );

         View::share(

            'headerCategories',

            ProductCategory::where('status', 1)
                ->orderBy('name')
                ->get()

        );
    }
    
}
