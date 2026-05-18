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

                <button class="getButon">

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
                            <li><a href="{{ route('about-us') }}"><span class="link-icon">→</span> About</a></li>
                            <li><a href="{{ route('products') }}"><span class="link-icon">→</span> Products</a></li>
                             <li><a href="{{ route('hrb-plywood') }}"><span class="link-icon">→</span> HRB Plywood</a>
                            </li>
                            <li><a href="{{ route('our-brands') }}"><span class="link-icon">→</span> Our Brands</a></li>
                            <li><a href="{{ route('gallery') }}"><span class="link-icon">→</span> Gallery</a></li>
                            <li><a href="{{ route('blogs') }}"><span class="link-icon">→</span> Blog</a></li>
                            <li><a href={{ route('faq') }}><span class="link-icon">→</span> FAQ</a></li>
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

                    <!-- <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <span class="divider">•</span>
                    <a href="#">Terms & Conditions</a>
                    <span class="divider">•</span>
                    <a href="#">Site Map</a>
                </div> -->

                    <div class="footer-social-section">
                        <!-- <h5 class="footer-social-title">Follow Us</h5> -->
                        <div class="footer_links">

                            @if($headerFooter && $headerFooter->whatsapp)

                                <a href="https://wa.me/{{ $headerFooter->whatsapp }}" target="_blank" class="social-link"
                                    title="WhatsApp">

                                    <i class="fa-brands fa-whatsapp"></i>

                                </a>

                            @endif

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

        </div>

    </footer>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>