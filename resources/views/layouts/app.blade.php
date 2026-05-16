<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title', 'Harsh Plywood - Quality Plywood in India')
    </title>
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

                        <img src="{{ asset('/images/top-logo.jpeg')}}" alt="logo">

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

                        <li class="nav-item dropdown">

                            <a class="nav-link" href="{{ route('about-us') }}">
                                About Us
                            </a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="about-us.html">
                                        Our Story
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="about-us.html">
                                        Our Team
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="about-us.html">
                                        Testimonials
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="nav-item dropdown">

                            <a class="nav-link" href="{{ route('products') }}">
                                Products
                            </a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item" href="products.html">
                                        Plywood
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="products.html">
                                        Architectural Hardware
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="products.html">
                                        Laminates
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="products.html">
                                        Acrylic Sheets
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="products.html">MDF Panel</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="products.html">Wooden Flooring</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="products.html">Kitchen Accessories</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="products.html">Kitchen Appliances</a>
                                </li>
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

            <li class="mobile-dropdown">

                <div class="mobile-dropdown-head">

                    <a href="{{ route('about-us') }}">
                        About Us
                    </a>

                    <span class="dropdown-icon">+</span>

                </div>

                <ul class="mobile-submenu">

                    <li>
                        <a href="about-us.html">
                            Our Story
                        </a>
                    </li>

                    <li>
                        <a href="about-us.html">
                            Our Team
                        </a>
                    </li>

                    <li>
                        <a href="about-us.html">
                            Testimonials
                        </a>
                    </li>

                </ul>

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

                    <li><a href="products.html">Plywood</a></li>
                    <li><a href="products.html">Architectural Hardware</a></li>
                    <li><a href="products.html">Laminates</a></li>
                    <li><a href="products.html">Acrylic Sheets</a></li>
                    <li><a href="products.html">MDF Panel</a></li>
                    <li><a href="products.html">Wooden Flooring</a></li>
                    <li><a href="products.html">Kitchen Accessories</a></li>
                    <li><a href="products.html">Kitchen Appliances</a></li>

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
            <div class="row gy-5">

                <!-- Brand Section -->
                <div class="col-lg-4 col-md-6">

                    <div class="footer-brand-section">

                        <div class="footer-logo-box">
                            <img src="{{ asset('/images/footer-logo.jpeg')}}" width="140" class="white-logo">
                        </div>

                        <p class="footer-brand-desc">
                            Harsh Plywood is a trusted destination for premium plywood,
                            laminates, architectural hardware, wooden flooring,
                            modular kitchen accessories, and complete interior solutions
                            crafted for modern living spaces.
                        </p>



                    </div>

                </div>

                <!-- Quick Links Section -->
                <div class="col-lg-2 col-md-6">

                    <div class="footer-menu-section">

                        <h4 class="footer-menu-title">
                            <i class="fa-solid fa-link"></i> Quick Links
                        </h4>

                        <ul class="footer-menu-list">
                            <li><a href="{{ route('home') }}"><span class="link-icon">→</span> Home</a></li>
                            <li><a href="{{ route('about-us') }}"><span class="link-icon">→</span> About</a></li>
                            <li><a href="{{ route('products') }}"><span class="link-icon">→</span> Products</a></li>
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
                            <i class="fa-solid fa-box"></i> Products
                        </h4>

                        <ul class="footer-menu-list">
                            <li><a href="products.html"><span class="link-icon">→</span> Plywood</a></li>
                            <li><a href="products.html"><span class="link-icon">→</span> Laminates</a></li>
                            <li><a href="hrb-plywood.html"><span class="link-icon">→</span> HRB Plywood</a></li>
                            <li><a href="products.html"><span class="link-icon">→</span> MDF Panel</a></li>
                            <li><a href="products.html"><span class="link-icon">→</span> Wooden Flooring</a></li>
                            <li><a href="{{ route('our-brands') }}"><span class="link-icon">→</span> Our Brands</a></li>
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
                                    <a href="#">I-Thum Tower, Sector 62, Noida</a>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <h5>Phone</h5>
                                    <a href="tel:+918656789976">+91 8656789976</a>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <h5>Email</h5>
                                    <a href="mailto:info@harshplywood.com">info@harshplywood.com</a>
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
                        <p>© <span id="yearid"></span> Harsh Plywood. All Rights Reserved.</p>
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
                            <a href="#" class="social-link" title="WhatsApp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="#" class="social-link" title="YouTube">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                            <a href="#" class="social-link" title="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link" title="LinkedIn">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
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