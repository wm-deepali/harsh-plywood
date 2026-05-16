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

                            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->heading }}">

                        </div>

                        <div class="hero-overlay"></div>

                        <div class="container hero-content">

                            <div class="hero-text-wrap">

                                <div class="hero-subtitle">
                                    {{ $slider->subtitle }}
                                </div>

                                <h1 class="hero-title">
                                    {{ $slider->heading }}
                                </h1>

                                <p class="hero-desc">
                                    {{ $slider->description }}
                                </p>

                                <a href="{{ $slider->button_link ?? '#' }}" class="hero-main-btn">

                                    {{ $slider->button_text }}

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

                    <div class="about-image">

                        <!-- AWARD BOX -->

                        <div class="award-box">

                            <!-- ICON -->

                            <div class="award-icon">

                                <i class="fa-regular fa-star"></i>

                            </div>

                            <!-- TEXT -->

                            <h3>

                                Best Awarded
                                <br>
                                Company

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
                                Since 1986
                            </span>

                        </div>



                        <!-- TITLE -->

                        <h2 class="x-about-title">

                            Premium Plywood &
                            <br>
                            Modern Interior Solutions.

                        </h2>



                        <!-- DESCRIPTION -->

                        <p class="x-about-desc">

                            Harsh Plywood is a trusted destination for premium plywood, laminates, veneers, hardware,
                            modular kitchen accessories, wooden flooring, and modern interior products crafted to
                            enhance every residential and commercial space.

                        </p>



                        <!-- FEATURES -->

                        <div class="row g-4">

                            <!-- ITEM -->

                            <div class="col-md-6">

                                <div class="x-feature-box">

                                    <div class="x-feature-icon">

                                        <i class="fa-solid fa-screwdriver-wrench"></i>

                                    </div>

                                    <h5>
                                        Premium Plywood
                                    </h5>

                                </div>

                            </div>



                            <!-- ITEM -->

                            <div class="col-md-6">

                                <div class="x-feature-box">

                                    <div class="x-feature-icon">

                                        <i class="fa-solid fa-helmet-safety"></i>

                                    </div>

                                    <h5>
                                        Architectural Hardware
                                    </h5>

                                </div>

                            </div>



                            <!-- ITEM -->

                            <div class="col-md-6">

                                <div class="x-feature-box">

                                    <div class="x-feature-icon">

                                        <i class="fa-solid fa-hand-holding-dollar"></i>

                                    </div>

                                    <h5>
                                        Wooden Flooring
                                    </h5>

                                </div>

                            </div>



                            <!-- ITEM -->

                            <div class="col-md-6">

                                <div class="x-feature-box">

                                    <div class="x-feature-icon">

                                        <i class="fa-solid fa-building"></i>

                                    </div>

                                    <h5>
                                        Modular Kitchen Solutions
                                    </h5>

                                </div>

                            </div>

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



                <div class="col-lg-3 col-md-6 col-6">

                    <div class="counter-box">

                        <div class="counter-top">

                            <i class="fa-regular fa-face-smile"></i>

                            <span>
                                Happy Client Review
                            </span>

                        </div>

                        <h2 class="counter-number">

                            <span class="counter" data-target="235">
                                0
                            </span>

                            <small>+</small>

                        </h2>

                    </div>

                </div>





                <div class="col-lg-3 col-md-6 col-6">

                    <div class="counter-box">

                        <div class="counter-top">

                            <i class="fa-regular fa-user"></i>

                            <span>
                                Work Departments
                            </span>

                        </div>

                        <h2 class="counter-number">

                            <span class="counter" data-target="420">
                                0
                            </span>

                            <small>+</small>

                        </h2>

                    </div>

                </div>





                <div class="col-lg-3 col-md-6 col-6">

                    <div class="counter-box">

                        <div class="counter-top">

                            <i class="fa-regular fa-comments"></i>

                            <span>
                                Our Happy Client
                            </span>

                        </div>

                        <h2 class="counter-number">

                            <span class="counter" data-target="30">
                                0
                            </span>

                            <small>K</small>

                        </h2>

                    </div>

                </div>





                <div class="col-lg-3 col-md-6 col-6">

                    <div class="counter-box">

                        <div class="counter-top">

                            <i class="fa-regular fa-id-card"></i>

                            <span>
                                Staff members
                            </span>

                        </div>

                        <h2 class="counter-number">

                            <span class="counter" data-target="305">
                                0
                            </span>

                            <small>+</small>

                        </h2>

                    </div>

                </div>

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

                        <div class="service-card">

                            <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}">

                            <div class="overlay"></div>

                            <div class="card-content">

                                <h3>{{ $category->name }}</h3>

                                <div class="arrow-btn">
                                    ↗
                                </div>

                            </div>

                            <p>
                                {{ $category->short_description }}
                            </p>

                        </div>

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

            <div class="row align-items-center justify-content-center ">

                <div class="col-lg-12 text-center">

                    <div class="mini-title justify-content-center">
                        Since 1986
                    </div>

                    <h2 class="main-title">
                        Why choose us
                    </h2>

                </div>



                <div class="col-lg-9 text-center">

                    <p class="top-desc text-center">At Harsh Plywood, we bring decades of excellence in premium plywood,
                        laminates, hardware, modular kitchens, wooden flooring, and interior solutions. With a
                        commitment to quality craftsmanship and customer satisfaction, we help create elegant and
                        durable living spaces for every home and project.</p>

                </div>





            </div>





            <!-- MAIN CONTENT -->

            <div class="row align-items-center pt-4">

                <!-- LEFT -->

                <div class="col-lg-4">

                    <div class="feature-box">

                        <div class="feature-icon">

                            <i class="fa-solid fa-medal"></i>

                        </div>

                        <div class="feature-content">

                            <h3>Premium Quality Products</h3>

                            <p>We provide superior-quality plywood, laminates, veneers, wooden flooring, and decorative
                                interior products.</p>

                        </div>

                    </div>



                    <div class="feature-box">

                        <div class="feature-icon">

                            <i class="fa-solid fa-tv"></i>

                        </div>

                        <div class="feature-content">

                            <h3>Modern Interior Solutions</h3>

                            <p>rom modular kitchens to exclusive hardware fittings, we offer innovative and stylish
                                interior solutions.</p>

                        </div>

                    </div>



                    <div class="feature-box">

                        <div class="feature-icon">

                            <i class="fa-solid fa-ruler-combined"></i>

                        </div>

                        <div class="feature-content">

                            <h3>Trusted Industry Experience</h3>

                            <p>With years of expertise in the plywood and interior industry, we have built a strong
                                reputation for reliability.</p>

                        </div>

                    </div>

                </div>





                <!-- CENTER IMAGE -->
                <div class="col-lg-4">
                    <div class="feature-image-wrapper">
                        <div class="main-feature-img">
                            <img src="{{ asset('images/workshop-main.png')}}" alt="Modern Workshop">
                        </div>
                        <div class="overlap-feature-img">
                            <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=870&auto=format&fit=crop"
                                alt="Plywood Detail">
                        </div>
                    </div>
                </div>





                <!-- RIGHT -->

                <div class="col-lg-4">

                    <div class="feature-box firstbox">

                        <div class="feature-icon">

                            <i class="fa-solid fa-file-invoice-dollar"></i>

                        </div>

                        <div class="feature-content ">

                            <h3>
                                Transparent Pricing
                            </h3>

                            <p>We believe in fair and transparent pricing with the best value for premium-quality
                                interior and plywood products.</p>

                        </div>

                    </div>



                    <div class="feature-box ">

                        <div class="feature-icon">

                            <i class="fa-solid fa-users"></i>

                        </div>

                        <div class="feature-content">

                            <h3>
                                Professional Team
                            </h3>

                            <p>Our experienced and dedicated team assists customers in choosing the right materials,
                                finishes, and interior solutions.</p>

                        </div>

                    </div>



                    <div class="feature-box">

                        <div class="feature-icon">

                            <i class="fa-solid fa-trophy"></i>

                        </div>

                        <div class="feature-content">

                            <h3>Complete Interior Range</h3>

                            <p>Harsh Plywood offers a complete range including plywood, laminates, decorative veneers,
                                modular kitchens.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>




    <!-- our latest products -->

    <!-- ========================= -->
    <!-- PRODUCTS SECTION -->
    <!-- ========================= -->

    <!-- =========================
                                 LIGHT GALLERY SECTION
                            ========================= -->

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

                    <div class="category-slider-wrapper position-relative px-5">

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

                                            {{ $category->name }}

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

                </div>

            </div>


            <!-- GALLERY -->
            <div class="gallery-wrapper">

                <div class="row g-4">

                    @foreach($products as $product)

                        <div class="col-lg-3 col-md-6 gallery-item {{ $product->category->slug }}">

                            <div class="gallery-card">

                                <img src="{{ asset('storage/' . $product->images->first()->image ?? 'assets/images/default.png') }}"
                                    alt="{{ $product->name }}">

                                <div class="gallery-overlay">

                                    <div class="gallery-plus-icon">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>

                                    <div class="gallery-content">

                                        <h3>{{ $product->category->name }}</h3>

                                        <span>{{ $product->name }}</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

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
                            <img src="{{ asset('images/top-logo.jpeg')}}" width="145" class="mx-auto d-block">
                        </div>
                        <div class="flex-grow-1">
                            <p>At Harsh Plywood, we believe every space deserves strength, style, and timeless
                                elegance. With years of experience in the plywood and interior industry, we have
                                become a trusted destination for premium plywood, laminates, veneers, hardware,
                                modular kitchen solutions, acrylic sheets, MDF panels, wooden flooring, and
                                interior accessories.</p>
                        </div>
                        <div class="packesPurchaseButoon mt-auto">
                            <button class="btn-primary w-100 mb-2">Contact Now</button>
                            <button class="secondwhatssbutton w-100">Whatsapp Now</button>
                        </div>
                    </div>
                </div>

                <!-- MIDDLE BOX (ACTIVE) -->
                <div class="col-lg-4">
                    <div class="packegs_boxex activepackegs h-100 d-flex flex-column">
                        <div class="mini-title text-white mb-2">Pricing Plan</div>
                        <h2 class="main-title text-white mb-4">Choose plan for house interior</h2>
                        <div class="icons_packesSecond flex-grow-1">
                            <a href="#" class="text-white d-flex align-items-center mb-3"><i
                                    class="fa-solid fa-bag-shopping me-2"></i>Get 30 day free trial</a>
                            <a href="#" class="text-white d-flex align-items-center mb-3"><i
                                    class="fa-solid fa-wallet me-2"></i>No any hidden fees pay</a>
                            <a href="#" class="text-white d-flex align-items-center mb-3"><i
                                    class="fa-solid fa-clock me-2"></i>You can cancel anytime</a>
                        </div>
                        <div class="mt-auto">
                            <a href="#" class="consult-btn w-100">
                                Book Consult
                                <span>↗</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- RIGHT BOX -->
                <div class="col-lg-4">
                    <div class="packegs_boxex h-100 d-flex flex-column">
                        <div class="mb-4">
                            <img src="{{ asset('images/hrb-logo.png')}}" width="145" class="mx-auto d-block">
                        </div>
                        <div class="flex-grow-1">
                            <p>HRB is a trusted name in premium plywood, laminates, hardware, and interior solutions,
                                dedicated to transforming spaces with quality, durability, and modern design. With a
                                strong commitment to excellence, HRB provides a wide range of interior and surface
                                products that combine functionality with aesthetic appeal for residential, commercial,
                                and architectural projects.</p>
                        </div>
                        <div class="packesPurchaseButoon mt-auto">
                            <button class="btn-primary w-100 mb-2">Contact Now</button>
                            <button class="thiedbutton w-100">Whatsapp Now</button>
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




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>

                            <p class="testimonial-text">

                                Harsh Plywood offers premium quality plywood and laminates with excellent finishing.
                                Their product range and customer service exceeded our expectations.

                            </p>

                            <div class="testimonial-user">

                                <img src="https://randomuser.me/api/portraits/women/65.jpg">

                                <div>

                                    <h4>
                                        Priya Sharma
                                    </h4>

                                    <span>
                                        Interior Designer
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




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>

                            <p class="testimonial-text">

                                We purchased plywood and modular kitchen accessories from Harsh Plywood.
                                The quality, durability, and pricing were truly impressive.

                            </p>

                            <div class="testimonial-user">

                                <img src="https://randomuser.me/api/portraits/men/32.jpg">

                                <div>

                                    <h4>
                                        Rajesh Verma
                                    </h4>

                                    <span>
                                        Architect
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




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>

                            <p class="testimonial-text">

                                Harsh Plywood helped us choose the perfect laminates and wooden flooring for our home.
                                Their team was professional and very supportive throughout the project.

                            </p>

                            <div class="testimonial-user">

                                <img src="https://randomuser.me/api/portraits/women/45.jpg">

                                <div>

                                    <h4>
                                        Neha Kapoor
                                    </h4>

                                    <span>
                                        Home Owner
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




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>

                            <p class="testimonial-text">

                                Excellent collection of plywood, hardware, and interior products.
                                Harsh Plywood delivered everything on time with outstanding service quality.

                            </p>

                            <div class="testimonial-user">

                                <img src="https://randomuser.me/api/portraits/men/41.jpg">

                                <div>

                                    <h4>
                                        Aman Gupta
                                    </h4>

                                    <span>
                                        Builder
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




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fa-solid fa-quote-right"></i>
                            </div>

                            <p class="testimonial-text">

                                From acrylic sheets to decorative laminates, Harsh Plywood provides premium products
                                with modern designs.
                                We are extremely satisfied with the final results.

                            </p>

                            <div class="testimonial-user">

                                <img src="https://randomuser.me/api/portraits/women/22.jpg">

                                <div>

                                    <h4>
                                        Simran Malhotra
                                    </h4>

                                    <span>
                                        Interior Consultant
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

                </div>



                <!-- PAGINATION -->

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section>



    <!-- ========================= -->
    <!-- CLIENT LOGO SECTION -->
    <!-- ========================= -->

    <section class="client-logo-section">

        <div class="container-fluid px-lg-5">

            <!-- HEADING -->

            <!-- <div class="client-heading">

                                        <div class="client-mini-title">
                                            Trusted Clients
                                        </div>

                                        <h2 class="client-title">
                                            Brands We Worked With
                                        </h2>

                                    </div> -->




            <!-- SWIPER -->

            <div class="swiper clientLogoSwiper">

                <div class="swiper-wrapper">




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c1.png')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c2.png')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c3.jpg')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">


                            <img src="{{ asset('images/c4.png')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c5.png')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c7.png')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c8.png')}}">

                        </div>

                    </div>




                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c9.png')}}">

                        </div>

                    </div>


                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c10.png')}}">

                        </div>

                    </div>


                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c11.jpg')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c12.jfif')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c13.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c14.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c15.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c16.png')}}">

                        </div>

                    </div>


                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c17.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c18.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c19.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c20.png')}}">

                        </div>

                    </div>


                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c21.jfif')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c22.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c23.jpg')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c24.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c25.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c26.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c27.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c28.jpg')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c29.jfif')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c30.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c31.jpg')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c32.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c33.jfif')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c34.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c35.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c36.png')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c37.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c38.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c39.jpg')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c40.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c41.png')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c42.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c43.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c44.png')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c45.png')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c46.jfif')}}">

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c47.png')}}">

                        </div>

                    </div>
                    <!-- ITEM -->

                    <div class="swiper-slide">

                        <div class="client-logo-item">

                            <img src="{{ asset('images/c48.jpg')}}">

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- VIDEO SECTION -->
    <!-- ========================= -->

    <section class="creative-video-section">

        <div class="creative-video-content">

            <!-- SUBTITLE -->

            <div class="creative-subtitle">

                Premium Plywood & Interior Solutions

            </div>



            <!-- TITLE -->

            <h2 class="creative-title">

                Creating modern spaces with premium plywood and elegant interiors
            </h2>



            <!-- PLAY BUTTON -->

            <div class="video-play-wrapper">

                <!-- WAVES -->

                <span class="video-wave"></span>

                <span class="video-wave wave2"></span>

                <span class="video-wave wave3"></span>



                <!-- BUTTON -->

                <a href="#" class="video-play-btn">

                    <i class="fa-solid fa-play"></i>

                </a>

            </div>

        </div>

    </section>




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
                <!-- Blog 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('images/p1.jpg')}}" alt="Blog 1">
                            <div class="blog-date">
                                <span>15</span>
                                <small>May</small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-tag"></i> Plywood Guide</span>
                            </div>
                            <h3 class="blog-card-title">
                                <a href="blog-details.html">How to Choose the Right Plywood for Your Home</a>
                            </h3>
                            <p class="blog-text">
                                Selecting the right plywood is crucial for the longevity and aesthetic appeal of your
                                furniture...
                            </p>
                            <a href="blog-details.html" class="blog-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('images/blog1.png')}}" alt="Blog 2">
                            <div class="blog-date">
                                <span>12</span>
                                <small>May</small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-tag"></i> Kitchen Trends</span>
                            </div>
                            <h3 class="blog-card-title">
                                <a href="blog-details.html">Modern Kitchen Laminate Trends in 2024</a>
                            </h3>
                            <p class="blog-text">
                                Explore the latest textures and colors that are dominating the modern kitchen design
                                landscape...
                            </p>
                            <a href="blog-details.html" class="blog-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('images/p4.jpg')}}" alt="Blog 3">
                            <div class="blog-date">
                                <span>10</span>
                                <small>May</small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-tag"></i> Hardware Tips</span>
                            </div>
                            <h3 class="blog-card-title">
                                <a href="blog-details.html">Architectural Hardware: The Hidden Gems</a>
                            </h3>
                            <p class="blog-text">
                                Learn how small hardware details can significantly elevate the overall design of your
                                space...
                            </p>
                            <a href="blog-details.html" class="blog-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="blog.html" class="hero-main-btn">
                    View All Posts <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>






@endsection