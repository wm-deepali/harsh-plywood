@extends('layouts.app')


@section('content')

    <!-- ========================= -->
    <!-- HERO SLIDER -->
    <!-- ========================= -->

    <section class="hero-slider">

        <div class="swiper heroSwiper">

            <div class="swiper-wrapper">

                @foreach($sliders as $slider)

                    <div class="swiper-slide">

                        <div class="hero-image">

                            <img src="{{ !empty($slider->image)
    ? asset('storage/' . $slider->image)
    : asset('images/default-slider.jpg') }}"
     alt="{{ $slider->heading ?? 'Slider Image' }}">

                        </div>

                        <div class="hero-overlay"></div>

                        <div class="container hero-content">

                            <div class="hero-text-wrap">

                                <div class="hero-subtitle">
                                    {{ $slider->subtitle ?? ""}}
                                </div>

                                <h1 class="hero-title">
                                    {{ $slider->heading ?? ""}}
                                </h1>

                                <p class="hero-desc">
                                    {{ $slider->description ?? ""}}
                                </p>

                                <a href="{{ $slider->button_link ?? '#' }}" class="hero-main-btn">

                                    {{ $slider->button_text ?? ""}}

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            <!-- PAGINATION -->

            <div class="hero-pagination-wrap">

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section>


    <!-- about us section -->
    <!-- ========================= -->
    <!-- ABOUT SECTION -->
    <!-- ========================= -->

    <section class="about-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-6">

                    <!-- IMAGE -->

                    <div class="about-image" style="background-image: url('{{ isset($homeAboutSection) && $homeAboutSection->image
        ? asset('storage/' . $homeAboutSection->image)
        : asset('images/about.jpg') }}');">

                        <!-- AWARD BOX -->

                        <div class="award-box">

                            <!-- ICON -->

                            <div class="award-icon">

                                <i class="{{ $homeAboutSection->award_icon ?? 'fa-regular fa-star' }}"></i>

                            </div>

                            <!-- TEXT -->

                            <h3>

                                {!! nl2br($homeAboutSection->award_title ?? 'Best Awarded <br> Company') !!}

                            </h3>

                        </div>

                    </div>

                </div>

                <!-- RIGHT CONTENT -->

                <div class="col-lg-6">

                    <div class="x-about-content">

                        <!-- SUBTITLE -->

                        <div class="x-subtitle-wrap">

                            <span class="x-subtitle-dot"></span>

                            <span class="x-subtitle-text">

                                {{ $homeAboutSection->sub_heading ?? 'Since 1986' }}

                            </span>

                        </div>

                        <!-- TITLE -->

                        <h2 class="x-about-title">

                            {!! nl2br($homeAboutSection->heading ?? 'Premium Plywood & <br> Modern Interior Solutions.') !!}

                        </h2>

                        <!-- DESCRIPTION -->

                        <div class="x-about-desc">

                            {!! $homeAboutSection->description ?? '' !!}

                        </div>

                        <!-- FEATURES -->

                        <div class="row g-4">

                            @foreach($homeAboutFeatures as $feature)

                                <div class="col-md-6">

                                    <div class="x-feature-box">

                                        <div class="x-feature-icon">

                                            <i class="{{ $feature->icon ?? ""}}"></i>

                                        </div>

                                        <h5>

                                            {{ $feature->title ?? ""}}

                                        </h5>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- coutner -->

    <!-- ========================= -->
    <!-- COUNTER SECTION -->
    <!-- ========================= -->

    <section class="counter-section">

        <div class="container">

            <div class="row g-4">

                @foreach($counters as $counter)

                    <div class="col-lg-3 col-md-6 col-6">

                        <div class="counter-box">

                            <div class="counter-top">

                                <i class="{{ $counter->icon ?? "" }}"></i>

                                <span>

                                    {{ $counter->title ?? "" }}

                                </span>

                            </div>

                            <h2 class="counter-number">

                                <span class="counter" data-target="{{ $counter->counter_value }}">

                                    0

                                </span>

                                <small>

                                    {{ $counter->counter_suffix ?? "" }}

                                </small>

                            </h2>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    <!-- service section -->
    <section class="service-section" id="serviceSection">

        <div class="container">

            <!-- BG TEXT -->

            <div class="bg-text">
                Services
            </div>


            <!-- SECTION HEADER -->

            <div class="section-header text-center">

                <span>
                    WHAT WE DO
                </span>

                <h2>
                    What we offer for you
                </h2>

            </div>



            <!-- SERVICES ROW -->

            <div class="row g-4">

                @foreach($categories as $category)

                    <div class="col-lg-3 col-md-6">

                        <a href="{{ route('product.details', $category->slug) }}"
                            class="text-decoration-none text-dark d-block">

                            <div class="service-card">

                                  <img src="{{ !empty($category->image)
    ? asset('storage/' . $category->image)
    : asset('images/default-category.jpg') }}"
     alt="{{ $category->name ?? 'Category Image' }}">

                                <div class="overlay"></div>

                                <div class="card-content">

                                    <h3>{{ $category->name ?? ""}}</h3>

                                    <div class="arrow-btn">
                                        ↗
                                    </div>

                                </div>

                                <p>
                                    {{ $category->short_description ?? ""}}
                                </p>

                            </div>

                        </a>

                    </div>

                @endforeach

            </div>


        </div>

    </section>


    <!-- ========================= -->
    <!-- WHY CHOOSE SECTION -->
    <!-- ========================= -->

    <section class="why-choose-section">

        <div class="container-fluid px-lg-5">

            <!-- TOP -->

            <div class="row align-items-center justify-content-center">

                <div class="col-lg-12 text-center">

                    <div class="mini-title justify-content-center">

                        {{ $whyChooseSection->sub_heading ?? 'Since 1986' }}

                    </div>

                    <h2 class="main-title">

                        {{ $whyChooseSection->heading ?? 'Why Choose Us' }}

                    </h2>

                </div>

                <div class="col-lg-9 text-center">

                    <div class="top-desc text-center">

                        {!! $whyChooseSection->description ?? '' !!}

                    </div>

                </div>

            </div>

            <!-- MAIN CONTENT -->

            <div class="row align-items-center pt-4">

                <!-- LEFT -->

                <div class="col-lg-4">

                    @foreach($whyChooseFeatures->where('position', 'left') as $feature)

                        <div class="feature-box">

                            <div class="feature-icon">

                                <i class="{{ $feature->icon ?? ""}}"></i>

                            </div>

                            <div class="feature-content">

                                <h3>

                                    {{ $feature->title ?? "" }}

                                </h3>

                                <p>

                                    {{ $feature->description ?? ""}}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

                <!-- CENTER IMAGE -->

                <div class="col-lg-4">

                    <div class="feature-image-wrapper">

                        <div class="main-feature-img">

                            <img src="{{ isset($whyChooseSection) && $whyChooseSection->main_image
        ? asset('storage/' . $whyChooseSection->main_image)
        : asset('images/workshop-main.png') }}" alt="Main Image">

                        </div>

                        <div class="overlap-feature-img">

                            <img src="{{ isset($whyChooseSection) && $whyChooseSection->small_image
        ? asset('storage/' . $whyChooseSection->small_image)
        : asset('images/about.jpg') }}" alt="Small Image">

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->

                <div class="col-lg-4">

                    @foreach($whyChooseFeatures->where('position', 'right') as $feature)

                        <div class="feature-box">

                            <div class="feature-icon">

                                <i class="{{ $feature->icon ?? ""}}"></i>

                            </div>

                            <div class="feature-content">

                                <h3>

                                    {{ $feature->title ?? ""}}

                                </h3>

                                <p>

                                    {{ $feature->description ?? "" }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

    <!-- our latest products -->

    <!-- ========================= -->
    <!-- PRODUCTS SECTION -->
    <!-- ========================= -->

    <section class="prodcts_wrapper">

        <div class="container-fluid px-lg-5">

            <!-- TOP -->

            <div class="row gy-4 align-items-center justify-content-center">

                <div class="col-lg-12 text-center">

                    <div class="mini-title justify-content-center">
                        PROCESS
                    </div>

                    <h2 class="main-title">
                        Our Latest Products
                    </h2>

                </div>

                <div class="col-lg-12">

                    <!-- FILTER BUTTONS -->

                    <div class="category-slider-wrapper position-relative px-5 d-none d-md-block">

                        <div class="swiper categorySwiper">

                            <div class="swiper-wrapper buttons_procuts">

                                {{-- All Button --}}
                                <div class="swiper-slide w-auto">
                                    <button class="filter-btn activebutton" data-filter="all">
                                        All
                                        <sup>{{ str_pad($products->count(), 2, '0', STR_PAD_LEFT) }}</sup>
                                    </button>
                                </div>

                                {{-- Dynamic Categories --}}
                                @foreach($categories as $category)

                                    <div class="swiper-slide w-auto">

                                        <button class="filter-btn"
                                            data-filter="{{ \Illuminate\Support\Str::slug($category->name) }}">

                                            {{ $category->name ?? ""}}

                                            <sup>
                                                {{ str_pad($category->products->count(), 2, '0', STR_PAD_LEFT) }}
                                            </sup>

                                        </button>

                                    </div>

                                @endforeach

                            </div>
                            
                            
                            
                            

                        </div>

                        <!-- Navigation Buttons -->
                        <div class="swiper-button-next category-next">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>

                        <div class="swiper-button-prev category-prev">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>

                    </div>
                    
                    
                    {{-- Mobile Filter Toggle Button --}}
<div class="d-block d-md-none mb-3">
    <button class="mobile-filter-toggle" id="openFilterDrawer">
        ☰ Filters
    </button>
</div>

{{-- Overlay --}}
<div class="filter-overlay" id="filterOverlay"></div>

{{-- Right Drawer --}}
<div class="filter-drawer" id="filterDrawer">

    <div class="drawer-header">
        <h5>Product Filters</h5>
        <button class="close-drawer" id="closeFilterDrawer">✕</button>
    </div>

    <div class="drawer-body">

        <div class="swiper-wrapper buttons_procuts d-block">

            {{-- All Button --}}
            <div class="swiper-slide w-auto">
                <button class="filter-btn activebutton" data-filter="all">
                    All
                    <sup>{{ str_pad($products->count(), 2, '0', STR_PAD_LEFT) }}</sup>
                </button>
            </div>

            {{-- Dynamic Categories --}}
            @foreach($categories as $category)

                <div class="swiper-slide w-auto">

                    <button class="filter-btn"
                        data-filter="{{ \Illuminate\Support\Str::slug($category->name) }}">

                        {{ $category->name }}

                        <sup>
                            {{ str_pad($category->products->count(), 2, '0', STR_PAD_LEFT) }}
                        </sup>

                    </button>

                </div>

            @endforeach

        </div>

    </div>

</div>

                </div>

            </div>


            <!-- GALLERY -->
            <div class="gallery-wrapper">

                <div class="row g-4">

                    @foreach($products->take(8) as $product)

                        <div class="col-lg-3 col-md-6 gallery-item {{ $product->category->slug }}">

                            <div class="gallery-card" data-images='@json(
                                $product->images->map(function ($img) {
                                    return asset("storage/" . $img->image);
                                })->values()
                            )'>

                                <img src="{{ asset('storage/' . $product->images->first()->image ?? 'assets/images/default.png') }}"
                                    alt="{{ $product->name }}">

                                <div class="gallery-overlay">

                                    <div class="gallery-plus-icon">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>

                                    <div class="gallery-content">

                                        <h3>{{ $product->category->name ?? ""}}</h3>

                                        <span>{{ $product->name ?? ""}}</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

  <div class="text-center mt-1">

                    <a href="{{ route('products') }}" style="opacity: 1; display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 18px 40px;
        border-radius: 60px;
        background: var(--primary-color);
        color: #fff;
        font-size: 17px;
        font-weight: 700;">

                        Load More

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>
            </div>

        </div>

    </section>



    <!-- packeg section -->
   <section class="packegs_wrapper">

        <div class="container-fluid px-lg-5">

            <div class="row gy-4">

                <!-- LEFT BOX -->
                <div class="col-lg-4">

                    <div class="packegs_boxex h-100 d-flex flex-column">

                        <div class="mb-4">

                            <img src="{{ !empty($packageSection->left_logo)
        ? asset('storage/' . $packageSection->left_logo)
        : asset('images/top-logo.jpeg') }}" width="145" class="mx-auto d-block">

                        </div>

                        <div class="flex-grow-1">

                            <p>

                                {{ $packageSection->left_description ?? '' }}

                            </p>

                        </div>

                        <div class="packesPurchaseButoon mt-auto">

                            <button type="button" class="btn-primary w-100 mb-2"
                                onclick="window.location.href='{{ $packageSection->left_contact_link ?? '#' }}'">

                                {{ $packageSection->left_contact_text ?? 'Contact Now' }}

                            </button>

                            <button type="button" class="secondwhatssbutton w-100"
                                onclick="window.open('{{ $packageSection->left_whatsapp_link ?? '#' }}', '_blank')">

                                {{ $packageSection->left_whatsapp_text ?? 'Whatsapp Now' }}

                            </button>

                        </div>

                    </div>

                </div>

                <!-- MIDDLE BOX -->
                <div class="col-lg-4">

                    <div class="packegs_boxex activepackegs h-100 d-flex flex-column">

                        <div class="mini-title text-white mb-2">

                            {{ $packageSection->middle_subtitle ?? 'Pricing Plan' }}

                        </div>

                        <h2 class="main-title text-white mb-4">

                            {{ $packageSection->middle_title ?? 'Choose plan for house interior' }}

                        </h2>

                        <div class="icons_packesSecond flex-grow-1">

                            @if($packageSection->feature_text_1)

                                <a href="#" class="text-white d-flex align-items-center mb-3">

                                    <i class="{{ $packageSection->feature_icon_1 ?? "" }} me-2"></i>

                                    {{ $packageSection->feature_text_1 }}

                                </a>

                            @endif

                            @if($packageSection->feature_text_2)

                                <a href="#" class="text-white d-flex align-items-center mb-3">

                                    <i class="{{ $packageSection->feature_icon_2 ?? "s"}} me-2"></i>

                                    {{ $packageSection->feature_text_2 }}

                                </a>

                            @endif

                            @if($packageSection->feature_text_3)

                                <a href="#" class="text-white d-flex align-items-center mb-3">

                                    <i class="{{ $packageSection->feature_icon_3 ?? ""}} me-2"></i>

                                    {{ $packageSection->feature_text_3 }}

                                </a>

                            @endif

                        </div>

                        <div class="mt-auto">

                            <a href="{{ $packageSection->middle_button_link ?? '#' }}" class="consult-btn w-100">

                                {{ $packageSection->middle_button_text ?? 'Book Consult' }}

                                <span>↗</span>

                            </a>

                        </div>

                    </div>

                </div>

                <!-- RIGHT BOX -->
                <div class="col-lg-4">

                    <div class="packegs_boxex h-100 d-flex flex-column">

                        <div class="mb-4">

                            <img src="{{ !empty($packageSection->right_logo)
        ? asset('storage/' . $packageSection->right_logo)
        : asset('images/hrb-logo.png') }}" width="145" class="mx-auto d-block">

                        </div>

                        <div class="flex-grow-1">

                            <p>

                                {{ $packageSection->right_description ?? '' }}

                            </p>

                        </div>

                        <div class="packesPurchaseButoon mt-auto">

                            <button type="button" class="btn-primary w-100 mb-2"
                                onclick="window.location.href='{{ $packageSection->right_contact_link ?? '#' }}'">

                                {{ $packageSection->right_contact_text ?? 'Contact Now' }}

                            </button>

                            <button type="button" class="thiedbutton w-100"
                                onclick="window.open('{{ $packageSection->right_whatsapp_link ?? '#' }}', '_blank')">

                                {{ $packageSection->right_whatsapp_text ?? 'Whatsapp Now' }}

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- TESTIMONIALS -->
    <!-- ========================= -->

    <section class="testimonials-section">

        <div class="container-fluid px-lg-5">

            <!-- HEADING -->

            <div class="testimonial-mini-title">
                Testimonials
            </div>

            <h2 class="testimonial-title">

                What Our Clients Say

            </h2>


            <!-- SWIPER -->

            <div class="swiper testimonialsSwiper">

                <div class="swiper-wrapper">

                    @foreach($testimonials as $testimonial)

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="quote-icon">
                                    <i class="fa-solid fa-quote-right"></i>
                                </div>

                                <p class="testimonial-text">

                                    {{ $testimonial->feedback ?? ""}}

                                </p>

                                <div class="testimonial-user">

                                   @php

    $colors = [
        '#FF6B6B',
        '#6C5CE7',
        '#00B894',
        '#0984E3',
        '#E17055',
        '#D63031',
        '#00CEC9',
        '#FDCB6E'
    ];

    $bgColor = $colors[array_rand($colors)];

@endphp

@if(!empty($testimonial->image))

    <img src="{{ asset('storage/' . $testimonial->image) }}"
         alt="{{ $testimonial->title }}">

@else

    <div style="
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: {{ $bgColor }};
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
    ">

        {{ strtoupper(substr($testimonial->title, 0, 1)) }}

    </div>

@endif

                                    <div>

                                        <h4>
                                            {{ $testimonial->title ?? ""}}
                                        </h4>

                                        <span>
                                            {{ $testimonial->designation ?? ""}}
                                        </span>

                                    </div>

                                </div>

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section>



    <!-- ========================= -->
    <!-- CLIENT LOGO SECTION -->
    <!-- ========================= -->

    <section class="client-logo-section">

        <div class="container-fluid px-lg-5">

            <div class="swiper clientLogoSwiper">

                <div class="swiper-wrapper">

                    @foreach($brands as $brand)

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->brand_name }}">

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- VIDEO SECTION -->
    <!-- ========================= -->

      <section class="creative-video-section"
        style="background-image: url('{{ !empty($videoSection->background_image) ? asset('storage/' . $videoSection->background_image) : asset('images/bg-img.jpg') }}');">

        <div class="creative-video-content">

            <!-- SUBTITLE -->
            <div class="creative-subtitle">

                {{ $videoSection->subtitle ?? 'Premium Plywood & Interior Solutions' }}

            </div>

            <!-- TITLE -->
            <h2 class="creative-title">

                {{ $videoSection->title ?? 'Creating modern spaces with premium plywood and elegant interiors' }}

            </h2>

            <!-- PLAY BUTTON -->
            <div class="video-play-wrapper">

                <!-- WAVES -->
                <span class="video-wave"></span>

                <span class="video-wave wave2"></span>

                <span class="video-wave wave3"></span>

                <!-- BUTTON -->
                <a href="javascript:void(0)" class="video-play-btn" data-bs-toggle="modal" data-bs-target="#videoModal">

                    <i class="fa-solid fa-play"></i>

                </a>

            </div>

        </div>

    </section>

    {{-- VIDEO MODAL --}}
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content bg-dark border-0">

                <div class="modal-header border-0">

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>

                <div class="modal-body p-0">

                    <div class="ratio ratio-16x9">

                        <iframe src="{{ $videoSection->video_url ?? '' }}" title="Video Player"
                            allow="autoplay; encrypted-media" allowfullscreen>
                        </iframe>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================= -->
    <!-- LATEST BLOG SECTION -->
    <!-- ========================= -->
    <section class="blog-section py-5">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <div class="x-subtitle-wrap justify-content-center mb-3">
                        <span class="x-subtitle-dot"></span>
                        <span class="x-subtitle-text">INSIGHTS</span>
                    </div>
                    <h2 class="x-about-title">Latest From Our Blog</h2>
                    <p class="text-muted">Stay updated with the latest trends and innovations in plywood and interior
                        design.</p>
                </div>
            </div>

            <div class="row g-4">

                @foreach($blogs as $blog)

                    <div class="col-lg-4 col-md-6">

                        <div class="blog-card">

                            <div class="blog-image">

                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">

                                <div class="blog-date">

                                    <span>
                                        {{ $blog->created_at->format('d') }}
                                    </span>

                                    <small>
                                        {{ $blog->created_at->format('M') }}
                                    </small>

                                </div>

                            </div>

                            <div class="blog-content">

                                <div class="blog-meta">

                                    <span>
                                        <i class="fa-solid fa-tag"></i>
                                        Blog
                                    </span>

                                </div>

                                <h3 class="blog-card-title">

                                    <a href="{{ route('blog.details', $blog->slug) }}">
                                        {{ $blog->title }}
                                    </a>

                                </h3>

                                <p class="blog-text">

                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 120) }}

                                </p>

                                <a href="{{ route('blog.details', $blog->slug) }}" class="blog-btn">

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="text-center mt-5">
                <a href="blog.html" class="hero-main-btn">
                    View All Posts <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>


@endsection