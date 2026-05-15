@extends('layouts.app')


@section('content')



    <!-- ============================================== -->
    <div class='hrb-landing-page'>
        <!-- ULTRA CREATIVE HERO SECTION -->
        <!-- ============================================== -->


        <section class="ultra-hero">
            <div class="ultra-hero-img"></div>
            <div class="ultra-hero-overlay"></div>
            <div class="container ultra-hero-content">
                <div class="row">
                    <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1500">
                        <div class="ultra-badge"><i class="fa-solid fa-crown me-2"></i> Premium Sister Concern</div>
                        <h1 class="ultra-title">Premium Quality Plywood <br></h1>
                        <p class="ultra-desc">Discover the ultimate collection of high-grade plywood, architectural
                            hardware, and designer laminates engineered for perfection and endurance.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#ultra-products" class="ultra-btn text-decoration-none">Explore Products</a>
                            <a href="#ultra-contact" class="ultra-btn-outline text-decoration-none">Request Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- ULTRA CREATIVE ABOUT SECTION -->
        <!-- ============================================== -->


        <section class="py-5 bg-light mt-5" id="ultra-about">
            <div class="container py-5">
                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6" data-aos="zoom-out-right">
                        <div class="about-grid">
                            <img src="{{ asset('/images/p1.jpg')}}" class="img-main" alt="HRB Quality">
                            <img src="{{ asset('/images/p2.jpg')}}" class="img-float" alt="HRB Laminates">

                            <!-- Floating Logo Badge -->
                            <div class="position-absolute bg-white rounded-circle shadow-lg d-flex flex-column justify-content-center align-items-center"
                                style="width: 120px; height: 120px; top: -30px; left: -20px; z-index: 3;">
                                <h2 class="mb-0 fw-bold"
                                    style="font-family: serif; color: var(--wood-primary); font-size: 32px; line-height: 1;">
                                    HRB</h2>
                                <p class="mb-0 text-dark text-center"
                                    style="font-size: 8px; font-weight: 700; line-height: 1.2; letter-spacing: 0.5px;">
                                    HARI RAM <br>& BROTHERS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                        <div class="about-text-box">
                            <h6 class="hrb-text-accent fw-bold text-uppercase tracking-wide mb-2"
                                style="letter-spacing: 2px;">The HRB Story</h6>
                            <h2 class="display-6 fw-bold mb-4">Mastering the Art of <span
                                    style="color: var(--wood-primary);">Interior
                                    Excellence</span></h2>
                            <p class="text-muted mb-4 fs-5" style="line-height: 1.7;">
                                As a distinguished sister brand of Harsh Plywood, HRB brings a legacy of unparalleled
                                craftsmanship. We don't just supply materials; we deliver the structural integrity and
                                aesthetic finish your dream spaces demand.
                            </p>
                            <div class="row gy-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="text-white rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px; background-color: var(--wood-primary);">
                                            <i class="fa-solid fa-leaf"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0">Eco-Friendly</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="text-white rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px; background-color: var(--wood-primary);">
                                            <i class="fa-solid fa-shield-cat"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0">High Durability</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="text-white rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px; background-color: var(--wood-primary);">
                                            <i class="fa-solid fa-gem"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0">Premium Finish</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="text-white rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px; background-color: var(--wood-primary);">
                                            <i class="fa-solid fa-check-double"></i>
                                        </div>
                                        <h6 class="fw-bold mb-0">ISO Certified</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- ULTRA CREATIVE PRODUCTS SECTION -->
        <!-- ============================================== -->

        <section class="py-5" id="ultra-products">
            <div class="container py-5">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="hrb-text-accent fw-bold text-uppercase tracking-wide mb-2" style="letter-spacing: 2px;">
                        What We
                        Offer</h6>
                    <h2 class="fw-bold display-5 mb-3">Our Core Collections</h2>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="product-modern-card h-100">
                            <div class="overflow-hidden">
                                <img src="{{ asset('/images/p1.jpg')}}" class="product-modern-img" alt="Plywood">
                            </div>
                            <div class="product-modern-content">
                                <div class="product-modern-icon"><i class="fa-solid fa-layer-group"></i></div>
                                <h4 class="fw-bold mb-3">Premium Plywood</h4>
                                <p class="text-muted mb-4">High-grade commercial and marine plywood engineered for
                                    maximum
                                    core strength and longevity.</p>
                                <a href="products.html"
                                    class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Discover
                                    Plywood <i class="fa-solid fa-arrow-right ms-2"
                                        style="color: var(--wood-primary);"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-modern-card h-100">
                            <div class="overflow-hidden">
                                <img src="{{ asset('/images/p2.jpg')}}" class="product-modern-img" alt="Laminates">
                            </div>
                            <div class="product-modern-content">
                                <div class="product-modern-icon"><i class="fa-solid fa-leaf"></i></div>
                                <h4 class="fw-bold mb-3">Designer Laminates</h4>
                                <p class="text-muted mb-4">A stunning array of textured, matte, and gloss laminates to
                                    transform any surface into a masterpiece.</p>
                                <a href="products.html"
                                    class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Discover
                                    Laminates <i class="fa-solid fa-arrow-right ms-2"
                                        style="color: var(--wood-primary);"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="product-modern-card h-100">
                            <div class="overflow-hidden">
                                <img src="{{ asset('/images/p3.jfif')}}" class="product-modern-img" alt="Hardware">
                            </div>
                            <div class="product-modern-content">
                                <div class="product-modern-icon"><i class="fa-solid fa-hammer"></i></div>
                                <h4 class="fw-bold mb-3">Architectural Hardware</h4>
                                <p class="text-muted mb-4">Precision-crafted fittings and handles that perfectly bridge
                                    the
                                    gap between utility and luxury design.</p>
                                <a href="products.html"
                                    class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">Discover
                                    Hardware <i class="fa-solid fa-arrow-right ms-2"
                                        style="color: var(--wood-primary);"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->

        <!-- ============================================== -->
        <!-- WHY CHOOSE US SECTION -->
        <!-- ============================================== -->
        <section class="py-5" id="why-choose-us" style="background-color: var(--wood-bg);">
            <div class="container py-5">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="fw-bold text-uppercase tracking-wide mb-2 hrb-text-accent" style="letter-spacing: 2px;">
                        Our Strengths</h6>
                    <h2 class="fw-bold display-5 mb-3" style="color: var(--wood-primary);">Why Choose Us</h2>
                </div>
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <i class="fa-solid fa-gem"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--wood-primary);">Premium Quality</h4>
                            <p class="text-muted mb-0">Uncompromising standards in every sheet of plywood.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--wood-primary);">Durable Materials</h4>
                            <p class="text-muted mb-0">Engineered to withstand the test of time and usage.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <i class="fa-solid fa-handshake-angle"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--wood-primary);">Trusted Brand</h4>
                            <p class="text-muted mb-0">A legacy of trust, reliability, and excellence.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--wood-primary);">Modern Designs</h4>
                            <p class="text-muted mb-0">Innovative and aesthetic solutions for any interior.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <i class="fa-solid fa-face-smile"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: var(--wood-primary);">Customer Satisfaction</h4>
                            <p class="text-muted mb-0">Your vision and satisfaction are our top priorities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ULTRA CREATIVE LEGACY SECTION -->
        <!-- ============================================== -->

        <section class="legacy-section">
            <div class="legacy-pattern"></div>
            <div class="container position-relative z-index-2">
                <div class="row justify-content-center mb-5" data-aos="fade-up">
                    <div class="col-lg-8 text-center">
                        <div class="mx-auto mb-4 bg-white rounded-circle d-flex flex-column justify-content-center align-items-center shadow-sm"
                            style="width: 100px; height: 100px;">
                            <h2 class="mb-0 fw-bold"
                                style="font-family: serif; color: var(--wood-primary); font-size: 26px; line-height: 1;">
                                HRB</h2>
                            <p class="mb-0 text-dark text-center"
                                style="font-size: 7px; font-weight: 700; line-height: 1.2; letter-spacing: 0.5px;">HARI
                                RAM <br>& BROTHERS</p>
                        </div>
                        <h2 class="display-5 fw-bold mb-4">The HRB Legacy</h2>
                        <p class="fs-5 text-white-50" style="line-height: 1.8;">
                            HRB stands as a hallmark of unwavering trust and groundbreaking innovation. We empower
                            architects, designers, and homeowners with materials that redefine spatial aesthetics.
                        </p>
                    </div>
                </div>
                <div class="row gy-4 text-center">
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="legacy-card">
                            <i class="fa-solid fa-trophy fs-1 mb-3" style="color: #fdf2fa;"></i>
                            <div class="legacy-stat">25+</div>
                            <p class="text-white-50 text-uppercase letter-spacing-1 mb-0">Years of Excellence</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="legacy-card">
                            <i class="fa-solid fa-users fs-1 mb-3" style="color: #fdf2fa;"></i>
                            <div class="legacy-stat">10k+</div>
                            <p class="text-white-50 text-uppercase letter-spacing-1 mb-0">Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="legacy-card">
                            <i class="fa-solid fa-box-open fs-1 mb-3" style="color: #fdf2fa;"></i>
                            <div class="legacy-stat">500+</div>
                            <p class="text-white-50 text-uppercase letter-spacing-1 mb-0">Premium Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->

        <!-- ============================================== -->
        <!-- OUR PREMIUM BRANDS SECTION -->
        <!-- ============================================== -->






        <section class="client-logo-section py-5">

            <div class="container-fluid px-lg-5">

                <!-- HEADING -->



                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="fw-bold text-uppercase tracking-wide mb-2 hrb-text-accent" style="letter-spacing: 2px;">
                        Trusted Clients</h6>
                    <h2 class="fw-bold display-5 mb-3" style="color: var(--wood-primary);">Brands We Worked With</h2>
                </div>



                <!-- SWIPER -->

                <div class="swiper clientLogoSwiper">

                    <div class="swiper-wrapper">

                        <!-- ITEM -->

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('/images/axor.png')}}">

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('/images/hansgrohe.png')}}">

                            </div>
                        </div>

                        <!-- ITEM -->

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('/images/aquant.png')}}">

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('/images/3M.png')}}">

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('/images/vitra.png')}}">

                            </div>

                        </div>


                        <!-- ITEM -->

                        <div class="swiper-slide">

                            <div class="client-logo-item">

                                <img src="{{ asset('/images/jaquar.png')}}">

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>



        <!-- ULTRA CREATIVE CONTACT SECTION -->
        <!-- ============================================== -->

        <section class="pb-5 bg-light" id="ultra-contact">
            <div class="container pb-5">
                <div class="contact-ultra-wrapper" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <div class="contact-ultra-info d-flex flex-column justify-content-center">
                                <div class="contact-ultra-info-content">
                                    <h2 class="fw-bold mb-4 text-white">Let's Create <br>Together.</h2>
                                    <p class="text-white-50 mb-5 fs-5">Ready to source the best materials for your next
                                        project? Our team is here to help.</p>

                                    <div class="d-flex align-items-center gap-4 mb-4">
                                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center fs-4"
                                            style="width: 60px; height: 60px; color: var(--wood-primary);">
                                            <i class="fa-solid fa-phone-volume"></i>
                                        </div>
                                        <div>
                                            <p class="text-white-50 mb-1 small text-uppercase">Call Us Directly</p>
                                            <h5 class="fw-bold mb-0 text-white">+91 8656789976</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center fs-4"
                                            style="width: 60px; height: 60px; color: var(--wood-primary);">
                                            <i class="fa-solid fa-envelope-open-text"></i>
                                        </div>
                                        <div>
                                            <p class="text-white-50 mb-1 small text-uppercase">Email Us</p>
                                            <h5 class="fw-bold mb-0 text-white">info@harshplywood.com</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 p-4 p-md-5 d-flex align-items-center">
                            <div class="w-100 p-md-4">
                                <h3 class="fw-bold mb-4">Send a Quick Enquiry</h3>
                                <form>
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label class="ultra-label">First Name</label>
                                            <input type="text" class="form-control ultra-input" placeholder="John">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="ultra-label">Last Name</label>
                                            <input type="text" class="form-control ultra-input" placeholder="Doe">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="ultra-label">Email Address</label>
                                            <input type="email" class="form-control ultra-input"
                                                placeholder="john@example.com">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="ultra-label">Phone Number</label>
                                            <input type="tel" class="form-control ultra-input" placeholder="+91">
                                        </div>
                                        <div class="col-12">
                                            <label class="ultra-label">Your Requirement</label>
                                            <textarea class="form-control ultra-input" rows="3"
                                                placeholder="Tell us about your project..."></textarea>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <button type="submit" class="ultra-btn border-0 w-100 py-3 text-white"
                                                style="background: var(--wood-primary);">Submit Enquiry <i
                                                    class="fa-solid fa-arrow-right ms-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </div>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>

@endsection