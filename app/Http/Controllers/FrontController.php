<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(Request $request)
    {
       
        return view('front-pages.home');
    }

    public function about(Request $request)
    {
        return view('front-pages.about-us');
    }

    public function products(Request $request)
    {
        return view('front-pages.products');
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
        return view('front-pages.faq');
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

    public function productDetails(Request $request)
    {
        return view('front-pages.product-details');
    }

}