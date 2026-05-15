<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\HeroSlider;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = ProductCategory::count();

        $totalBlogs = Blog::count();

        $totalFaqs = Faq::count();

        $totalGalleryImages = Gallery::count();

        $totalGalleryCategories = GalleryCategory::count();

        $totalHeroSliders = HeroSlider::count();

        $totalTestimonials = Testimonial::count();

        $totalAwards = Award::count();

        $totalTeamMembers = AboutSection::where('type', 'team')
            ->count();

        $totalEnquiries = 0;

        return view(
            'admin.dashboard.index',
            compact(
                'totalProducts',
                'totalCategories',
                'totalBlogs',
                'totalFaqs',
                'totalGalleryImages',
                'totalGalleryCategories',
                'totalHeroSliders',
                'totalTestimonials',
                'totalAwards',
                'totalTeamMembers',
                'totalEnquiries'
            )
        );
    }
}