<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
       {{ $blog->meta_title ?? $category->meta_title ?? $page->meta_title ?? $seo->meta_title ?? 'Harsh Plywood - Quality Plywood in India' }}
    </title>

    <meta name="keywords" content="{{ $blog->meta_keywords ?? $category->meta_keywords ?? $seo->meta_keywords ?? '' }}">

    <meta name="description"
        content="{{ $blog->meta_description ?? $category->meta_description ?? $page->meta_description ?? $seo->meta_description ?? '' }}">


    @if(!empty($seo->schema_script))
        {!! $seo->schema_script !!}
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/hrb.style.css')}}">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>

<style>
    .footer-dynamic-pages {
    border-top: 1px solid rgba(255,255,255,0.1);
}

.footer-page-link {
    transition: 0.3s;
    font-size: 15px;
}

.footer-page-link:hover {
    color: #fcb900 !important;
}
</style>

    <!-- ========================= -->
    <!-- HEADER -->
    <!-- ========================= -->

    <header class="main-header">

        <div class="container">

            <nav class="navbar navbar-expand-lg">

                <!-- LOGO -->

                <div class="logo-wrapper">

                    <a href="{{ route('home') }}" class="logo-box">

                        <img src="{{ $headerFooter && $headerFooter->header_logo
    ? asset('storage/' . $headerFooter->header_logo)
    : asset('/images/top-logo.jpeg') }}" alt="logo">

                        <!-- TOP RIGHT CORNER -->

                        <div class="sticky-corner top-right-corner">

                            <svg width="22" height="22" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

                                <path d="M20 20V0C20 16 16 20 0 20H20Z" fill="#ffffff">
                                </path>

                            </svg>

                        </div>

                        <!-- BOTTOM LEFT CORNER -->

                        <div class="sticky-corner bottom-left-corner">

                            <svg width="22" height="22" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

                                <path d="M20 20V0C20 12 12 20 0 20H20Z" fill="#ffffff">
                                </path>

                            </svg>

                        </div>

                    </a>

                </div>

                <!-- TOGGLE -->

                <button class="navbar-toggler text-white" type="button">

                    <i class="fa-solid fa-bars fs-4"></i>

                </button>

                <!-- MENU -->

                <div class="collapse navbar-collapse" id="mainMenu">

                    <ul class="navbar-nav align-items-lg-center">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us') }}">
                                About Us
                            </a>
                        </li>


                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="{{ route('products') }}" id="productsDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Products

                            </a>

                            <ul class="dropdown-menu">

                                @foreach($headerCategories as $category)

                                    <li>

                                        <a class="dropdown-item" href="{{ route('product.details', $category->slug) }}">

                                            {{ $category->name }}

                                        </a>

                                    </li>

                                @endforeach

                            </ul>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('hrb-plywood') }}">
                                HRB Plywood </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('our-brands') }}">
                                Our Brands
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-us') }}">
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- BUTTON -->

                <!--<button class="getButon">-->

                <!--    Get a Quote-->

                <!--</button>-->
                
                 <button class="quoteDrawerBtn getButon">
        Get a Quote
    </button>

            </nav>

        </div>

    </header>

    <!-- ========================= -->
    <!-- MOBILE OVERLAY -->
    <!-- ========================= -->

    <div class="mobile-overlay"></div>

    <!-- ========================= -->
    <!-- MOBILE SIDEBAR -->
    <!-- ========================= -->

    <div class="mobile-sidebar">

        <!-- CLOSE BUTTON -->

        <button class="sidebar-close">

            <i class="fa-solid fa-xmark"></i>

        </button>

        <!-- MOBILE MENU -->

        <ul class="mobile-menu">

            <li>
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <!-- ABOUT -->

            <li>
                <a href="{{ route('about-us') }}">
                    About Us
                </a>

            </li>

            <!-- PRODUCTS -->

            <li class="mobile-dropdown">

                <div class="mobile-dropdown-head">

                    <a href="{{ route('products') }}">
                        Products
                    </a>

                    <span class="dropdown-icon">+</span>

                </div>

                <ul class="mobile-submenu">

                    @foreach($headerCategories as $category)

                        <li>

                            <a href="{{ route('product.details', $category->slug) }}">

                                {{ $category->name }}

                            </a>

                        </li>

                    @endforeach

                </ul>


            </li>

            <li>
                <a href="{{ route('hrb-plywood') }}">
                    HRB Plywood
                </a>
            </li>

            <li>
                <a href="{{ route('our-brands') }}">
                    Our Brands
                </a>
            </li>

            <li>
                <a href="{{ route('gallery') }}">
                    Gallery
                </a>
            </li>

            <li>
                <a href="{{ route('contact-us') }}">
                    Contact
                </a>
            </li>

        </ul>

    </div>

    @yield('content')



    <!-- footer stat -->
    <footer class="footer_wrapper">

        <div class="container-fluid px-lg-5">

            <!-- Main Footer Content -->
            <div class="row">

                <!-- Brand Section -->
                <div class="col-lg-4 col-md-6">

                    <div class="footer-brand-section">

                        <div class="footer-logo-box">
                            <img src="{{ $headerFooter && $headerFooter->footer_logo
    ? asset('storage/' . $headerFooter->footer_logo)
    : asset('/images/footer-logo.jpeg') }}" width="140" class="white-logo">
                        </div>

                        <p class="footer-brand-desc">
                            {{ $headerFooter->short_content ?? '' }}
                        </p>

                                               <div class="footer-social-section">
                        <!-- <h5 class="footer-social-title">Follow Us</h5> -->
                        <div class="footer_links">

                           

                            @if($socialSetting && $socialSetting->facebook)

                                <a href="{{ $socialSetting->facebook }}" target="_blank" class="social-link"
                                    title="Facebook">

                                    <i class="fa-brands fa-facebook-f"></i>

                                </a>

                            @endif

                            @if($socialSetting && $socialSetting->instagram)

                                <a href="{{ $socialSetting->instagram }}" target="_blank" class="social-link"
                                    title="Instagram">

                                    <i class="fa-brands fa-instagram"></i>

                                </a>

                            @endif

                            @if($socialSetting && $socialSetting->youtube)

                                <a href="{{ $socialSetting->youtube }}" target="_blank" class="social-link" title="YouTube">

                                    <i class="fa-brands fa-youtube"></i>

                                </a>

                            @endif

                            @if($socialSetting && $socialSetting->linkedin)

                                <a href="{{ $socialSetting->linkedin }}" target="_blank" class="social-link"
                                    title="LinkedIn">

                                    <i class="fa-brands fa-linkedin-in"></i>

                                </a>

                            @endif

                            @if($socialSetting && $socialSetting->twitter)

                                <a href="{{ $socialSetting->twitter }}" target="_blank" class="social-link" title="Twitter">

                                    <i class="fa-brands fa-x-twitter"></i>

                                </a>

                            @endif

                        </div>

                    </div>

                    </div>

                </div>

                <!-- Quick Links Section -->
                <div class="col-lg-2 col-md-6">

                    <div class="footer-menu-section">

                        <h4 class="footer-menu-title">
                            Quick Links
                        </h4>

                        <ul class="footer-menu-list">
                            <li><a href="{{ route('home') }}"><span class="link-icon">→</span> Home</a></li>
                            <li><a href="{{ route('about-us') }}"><span class="link-icon">→</span> About Us</a></li>
                            <li><a href="{{ route('products') }}"><span class="link-icon">→</span> Our Products</a></li>
                             <li><a href="{{ route('hrb-plywood') }}"><span class="link-icon">→</span> HRB Plywood</a>
                            </li>
                            <li><a href="{{ route('our-brands') }}"><span class="link-icon">→</span> Our Brands</a></li>
                            <li><a href="{{ route('gallery') }}"><span class="link-icon">→</span> Gallery</a></li>
                            <li><a href="{{ route('blogs') }}"><span class="link-icon">→</span> Blogs</a></li>
                            <li><a href={{ route('faq') }}><span class="link-icon">→</span> FAQ</a></li>
                            <li><a href={{ route('contact-us') }}><span class="link-icon">→</span> Contact Us</a></li>
                        </ul>

                    </div>

                </div>

                <!-- Products Section -->
                <div class="col-lg-2 col-md-6">

                    <div class="footer-menu-section">

                        <h4 class="footer-menu-title">
                            Our Products
                        </h4>

                        <ul class="footer-menu-list">
                            @foreach($headerCategories as $category)

                                <li>

                                    <a href="{{ route('product.details', $category->slug) }}">

                                        <span class="link-icon">→</span>

                                        {{ $category->name }}

                                    </a>

                                </li>

                            @endforeach
                           
                        </ul>

                    </div>

                </div>

                <!-- Contact Section -->
                <div class="col-lg-4 col-md-6">

                    <div class="footer-contact-section">

                        <h4 class="footer-menu-title">
                            <i class="fa-solid fa-phone-volume"></i> Get In Touch
                        </h4>

                        <div class="contact-info-box">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="contact-content">
                                    <h5>Address</h5>
                                    <a href="#">{{ $headerFooter->address ?? '' }}</a>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <h5>Phone</h5>
                                    <a
                                        href="tel:{{ $headerFooter->mobile ?? '' }}">{{ $headerFooter->mobile ?? '' }}</a>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <h5>Email</h5>
                                    <a
                                        href="mailto:{{ $headerFooter->email ?? '' }}">{{ $headerFooter->email ?? '' }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- <a href="contact.html" class="footer-cta-btn">
                        <i class="fa-solid fa-arrow-right"></i> Contact Us
                    </a> -->

                    </div>

                </div>

            </div>

            <!-- Divider -->
            <div class="footer-divider"></div>

        </div>
        @if(count($dynamicPages) > 0 )
<!-- Divider -->
<div class="footer-divider"></div>

<!-- Dynamic Pages -->
<div class="footer-dynamic-pages py-3">
    <div class="container-fluid px-lg-5">

        <div class="d-flex flex-wrap justify-content-center gap-3">

            @foreach($dynamicPages as $page)

                <a href="{{ url($page->slug) }}"
                   class="text-white text-decoration-none footer-page-link">

                    {{ $page->title }}

                </a>

            @endforeach

        </div>

    </div>
</div>
        
        @endif
        <!-- COPYRIGHT -->
        <div class="footer-bottom">

            <div class="container-fluid px-lg-5">

                <div class="footer-bottom-content">

                    <div class="copyright-text">
                      @if ($headerFooter && $headerFooter->copyright)

    <p>{{ $headerFooter->copyright }}</p>

@else

    <p>
        © <span id="yearid"></span> Harsh Plywood. All Rights Reserved.
    </p>

@endif
                    </div>

                    
                <div class="footer_whatspp">
                     @if($headerFooter && $headerFooter->whatsapp)

                                <a href="https://wa.me/{{ $headerFooter->whatsapp }}" target="_blank" class="social-whatspp"
                                    title="WhatsApp">

                                    <i class="fa-brands fa-whatsapp"></i>

                                </a>

                            @endif
                </div>



    
 <div class="copyright-text">
    <p>  Design & Developed by <a href="https://www.webmingo.com/" class="text-white" style="text-decoration: underline !important;"> Web Mingo </a></p>
</div>

                </div>

            </div>

        </div>

    </footer>



<div class="quoteDrawerWrapper">

    <!-- Get Quote Button -->
    <!--<button class="quoteDrawerBtn">-->
    <!--    Get a Quote-->
    <!--</button>-->

    <!-- Overlay -->
    <div class="quoteDrawerOverlay"></div>

    <!-- Right Drawer -->
    <div class="quoteDrawerPanel">

        <!-- Close Button -->
        <button class="quoteDrawerClose"><i class="fa fa-times" aria-hidden="true"></i>
</button>
        <!--<button class="quoteDrawerClose">&times;</button>-->

        <!-- Content -->
        <div class="quoteDrawerContent">

            <span class="quoteDrawerTag">
                Quick Inquiry
            </span>

            <h2 class="quoteDrawerHeading">
                Get a Free Quote
            </h2>

            <p class="quoteDrawerSubtitle">
                Fill out the form and our team will get back to you shortly with the best solution.
            </p>

            <!-- Form -->
          {{-- Success Message --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif

{{-- Error Message --}}
@if ($errors->any())

    <div class="alert alert-danger alert-dismissible fade show">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif


<form class="quoteDrawerForm" method="POST" action="{{ route('quote.inquiry') }}">

    @csrf

    <div class="quoteDrawerField">

        <input type="text"
               name="name"
               placeholder="Full Name"
               value="{{ old('name') }}"
               class="@error('name') is-invalid @enderror">

        @error('name')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="quoteDrawerField">

        <input type="email"
               name="email"
               placeholder="Email Id"
               value="{{ old('email') }}"
               class="@error('email') is-invalid @enderror">

        @error('email')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="quoteDrawerField">

        <input type="tel"
               name="mobile"
               placeholder="Mobile Number"
               value="{{ old('mobile') }}"
               class="@error('mobile') is-invalid @enderror">

        @error('mobile')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="quoteDrawerField">

        <textarea name="message"
                  placeholder="Detail"
                  class="@error('message') is-invalid @enderror">{{ old('message') }}</textarea>

        @error('message')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    {{-- Google Captcha --}}
    <div class="quoteDrawerField">

        <div class="g-recaptcha"
             data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">

        </div>

        @error('g-recaptcha-response')

            <small class="text-danger d-block mt-2">

                {{ $message }}

            </small>

        @enderror

    </div>

    <button type="submit" class="quoteDrawerSubmit">

        Submit Now

    </button>

</form>

        </div>

    </div>

</div>


    <!-- =========================
     LIGHTBOX
========================= -->

    <div class="lightbox">

        <span class="close-btn">&times;</span>

        <span class="prev-btn">&#10094;</span>

        <img class="lightbox-image" src="" alt="">

        <span class="next-btn">&#10095;</span>

        <div class="lightbox-counter"></div>

        <div class="lightbox-thumbnails"></div>

    </div>

    <!-- JS -->
    <!-- bootrap -->
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    @if ($errors->any() || session('success'))

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const quoteDrawerWrapper =
            document.querySelector('.quoteDrawerWrapper');

        if (quoteDrawerWrapper) {

            quoteDrawerWrapper.classList.add('active');

        }

    });

</script>

@endif

</body>

</html>