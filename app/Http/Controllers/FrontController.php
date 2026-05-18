<?php

namespace App\Http\Controllers;
use App\Models\AboutSection;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\ContactEnquiry;
use App\Models\ContactUs;
use App\Models\Counter;
use App\Models\HomePackageSection;
use App\Models\HomeVideoSection;
use App\Models\HrbBrand;
use App\Models\HrbCounter;
use App\Models\HrbEnquiry;
use App\Models\HrbIntroFeature;
use App\Models\HrbOffer;
use App\Models\HrbPage;
use App\Models\HrbWhyChoose;
use App\Models\Page;
use App\Models\Product;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use App\Models\Faq;
use App\Models\ProductCategory;
use App\Models\Testimonial;
use App\Models\HeroSection;
use App\Models\SeoSetting;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\HomeAboutSection;
use App\Models\HomeAboutFeature;
use App\Models\WhyChooseSection;
use App\Models\WhyChooseFeature;
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

        $testimonials = Testimonial::where('status', 1)->latest()->get();

        $blogs = Blog::where('status', 1)
            ->where('show_home', 1)
            ->latest()
            ->take(3)
            ->get();

        $brands = Brand::where('status', 1)
            ->where('show_home', 1)
            ->latest()
            ->get();

        $seo = SeoSetting::where('page_name', 'Home')->first();

        $homeAboutSection = HomeAboutSection::first();

        $homeAboutFeatures = HomeAboutFeature::latest()
            ->get();

        $counters = Counter::where('status', 1)
            ->latest()
            ->get();

        $whyChooseSection = WhyChooseSection::first();

        $whyChooseFeatures = WhyChooseFeature::latest()
            ->get();

        $videoSection = HomeVideoSection::first();

        $packageSection = HomePackageSection::first();

        return view(
            'front-pages.home',
            compact(
                'sliders',
                'categories',
                'products',
                'testimonials',
                'blogs',
                'brands',
                'seo',
                'homeAboutSection',
                'homeAboutFeatures',
                'counters',
                'whyChooseSection',
                'whyChooseFeatures',
                'videoSection',
                'packageSection'
            )
        );
    }


    public function about(Request $request)
    {
        $heroSection = HeroSection::where('page_name', 'About Us')->first();

        $seo = SeoSetting::where('page_name', 'About Us')->first();

        $introduction = AboutSection::where('type', 'introduction')
            ->first();

        $history = AboutSection::where('type', 'history')
            ->first();

        $mission = AboutSection::where('type', 'mission')
            ->first();

        $vision = AboutSection::where('type', 'vision')
            ->first();

        $team = Team::where('status', 1)
            ->latest()
            ->get();

        return view(
            'front-pages.about-us',
            compact(
                'heroSection',
                'seo',
                'introduction',
                'history',
                'mission',
                'vision',
                'team'
            )
        );
    }

    public function awards(Request $request)
    {
        $heroSection = HeroSection::where(
            'page_name',
            'Awards & Certifications'
        )->first();

        $seo = SeoSetting::where(
            'page_name',
            'Awards & Certifications'
        )->first();

        $awards = Award::where('status', 1)
            ->latest()
            ->get();

        return view(
            'front-pages.awards',
            compact(
                'heroSection',
                'seo',
                'awards'
            )
        );
    }

    public function products(Request $request)
    {
        $categories = ProductCategory::where('status', 1)->get();

        $heroSection = HeroSection::where('page_name', 'Category Page')->first();

        $seo = SeoSetting::where('page_name', 'Category Page')->first();

        return view('front-pages.products', compact('categories', 'heroSection', 'seo'));
    }



    public function gallery(Request $request)
    {
        $heroSection = HeroSection::where('page_name', 'Gallery')->first();

        $seo = SeoSetting::where('page_name', 'Gallery')->first();

        $galleryCategories = GalleryCategory::where('status', 1)->get();

        $galleries = Gallery::with('category')
            ->where('status', 1)
            ->latest()
            ->get();

        return view(
            'front-pages.gallery',
            compact(
                'heroSection',
                'seo',
                'galleryCategories',
                'galleries'
            )
        );
    }

    public function blogs(Request $request)
    {
        $heroSection = HeroSection::where('page_name', 'Blog')->first();

        $seo = SeoSetting::where('page_name', 'Blog')->first();

        $blogs = Blog::where('status', 1)
            ->latest()
            ->paginate(6);

        return view(
            'front-pages.blogs',
            compact(
                'heroSection',
                'seo',
                'blogs'
            )
        );
    }
    public function blogDetails(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $recentBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'front-pages.blog-details',
            compact(
                'blog',
                'recentBlogs'
            )
        );
    }


    public function faq(Request $request)
    {
        $faqs = Faq::where('status', 1)->latest()->get();

        $heroSection = HeroSection::where('page_name', 'FAQ')->first();

        $seo = SeoSetting::where('page_name', 'FAQ')->first();

        return view('front-pages.faq', compact('faqs', 'heroSection', 'seo'));
    }


    public function hrbPlywood(Request $request)
    {
        $hrb = HrbPage::first();

        $introFeatures = HrbIntroFeature::where('status', 1)
            ->get();

        $whyChoose = HrbWhyChoose::where('status', 1)
            ->latest()
            ->get();

        $counters = HrbCounter::where('status', 1)
            ->latest()
            ->get();

        $brands = HrbBrand::where('status', 1)
            ->latest()
            ->get();


        $offers = HrbOffer::where('status', 1)
            ->latest()
            ->get();


        $seo = SeoSetting::where('page_name', 'HRB Plywood')->first();

        return view(
            'front-pages.hrb-plywood',
            compact(
                'hrb',
                'introFeatures',
                'whyChoose',
                'counters',
                'brands',
                'offers',
                'seo'
            )
        );
    }

    public function brands(Request $request)
    {
        $heroSection = HeroSection::where('page_name', 'Brands')->first();

        $seo = SeoSetting::where('page_name', 'Brands')->first();

        $brands = Brand::where('status', 1)
            ->where('show_brand_page', 1)
            ->latest()
            ->get();

        return view(
            'front-pages.brands',
            compact(
                'heroSection',
                'seo',
                'brands'
            )
        );
    }


    public function contact(Request $request)
    {
        $heroSection = HeroSection::where('page_name', 'Contact Us')->first();

        $seo = SeoSetting::where('page_name', 'Contact Us')->first();

        $contacts = ContactUs::where('status', 1)
            ->latest()
            ->get();

        return view(
            'front-pages.contact-us',
            compact(
                'heroSection',
                'seo',
                'contacts'
            )
        );
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

        $seo = SeoSetting::where('page_name', 'Product Listing Page')->first();
        $heroSection = HeroSection::where('page_name', 'Product Listing Page')->first();

        return view(
            'front-pages.product-details',
            compact('category', 'categories', 'products', 'seo', 'heroSection')
        );
    }


    public function contactEnquiry(Request $request)
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'min:3',
                'max:100'
            ],

            'email' => [
                'required',
                'email',
                'max:100'
            ],

            'phone' => [
                'required',
                'digits:10'
            ],

            'subject' => [
                'required',
                'string',
                'min:3',
                'max:150'
            ],

            'message' => [
                'required',
                'string',
                'min:10',
                'max:2000'
            ]

        ], [

            'name.required' => 'Please enter your name.',
            'name.min' => 'Name must be at least 3 characters.',

            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',

            'phone.required' => 'Please enter phone number.',
            'phone.digits' => 'Phone number must be 10 digits.',

            'subject.required' => 'Please enter subject.',

            'message.required' => 'Please enter your message.',
            'message.min' => 'Message must be at least 10 characters.'

        ]);

        ContactEnquiry::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'subject' => $request->subject,

            'message' => $request->message

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Your enquiry has been submitted successfully.'
            );
    }

    public function hrbEnquiry(Request $request)
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'min:3',
                'max:100'
            ],

            'email' => [
                'required',
                'email',
                'max:100'
            ],

            'phone' => [
                'required',
                'digits:10'
            ],

            'subject' => [
                'required',
                'string',
                'min:3',
                'max:150'
            ],

            'message' => [
                'required',
                'string',
                'min:10',
                'max:2000'
            ]

        ]);

        HrbEnquiry::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'subject' => $request->subject,

            'message' => $request->message

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Your enquiry has been submitted successfully.'
            );
    }

    public function dynamicPage($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('front-pages.dynamic-page', compact('page'));
    }

}