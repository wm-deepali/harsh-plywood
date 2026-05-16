<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use App\Models\Faq;
use App\Models\ProductCategory;

class FrontController extends Controller
{

    public function home(Request $request)
    {
        $sliders = HeroSlider::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $categories = ProductCategory::withCount('products')
            ->where('status', 1)
            ->get();

        $products = Product::where('status', 1)->get();


        return view('front-pages.home', compact('sliders', 'categories', 'products'));
    }

    public function about(Request $request)
    {
        return view('front-pages.about-us');
    }

    public function products(Request $request)
    {
        $categories = ProductCategory::where('status', 1)->get();

        return view('front-pages.products', compact('categories'));
    }

    public function gallery(Request $request)
    {
        return view('front-pages.gallery');
    }

    public function blogs(Request $request)
    {
        return view('front-pages.blogs');
    }

    public function blogDetails(Request $request)
    {
        return view('front-pages.blog-details');
    }


    public function faq(Request $request)
    {
        $faqs = Faq::where('status', 1)->latest()->get();

        return view('front-pages.faq', compact('faqs'));
    }


    public function hrbPlywood(Request $request)
    {
        return view('front-pages.hrb-plywood');
    }


    public function brands(Request $request)
    {
        return view('front-pages.brands');
    }


    public function contact(Request $request)
    {
        return view('front-pages.contact-us');
    }


    public function productDetails($slug)
    {
        $category = ProductCategory::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $categories = ProductCategory::where('status', 1)->get();

        $products = Product::with('images')
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->get();

        return view(
            'front-pages.product-details',
            compact('category', 'categories', 'products')
        );
    }
}