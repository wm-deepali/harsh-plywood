@extends('layouts.app')


@section('content')


    <section class="hp-about-hero">

        <img src="{{ asset('/images/blog1.png')}}" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">KITCHEN TRENDS</div>

                <h1 class="hp-hero-title">

                    Modern Kitchen Laminate Trends in 2024

                </h1>

                <p class="hp-hero-desc">
                    Explore the latest textures and colors that are dominating the modern kitchen design landscape.
                </p>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- BLOG DETAIL SECTION -->
    <!-- ========================= -->

    <section class="blog-details-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- MAIN CONTENT -->
                <div class="col-lg-8" data-aos="fade-up">

                    <div class="blog-single-post">
                        <div class="post-header mb-4">
                            <div class="post-meta-details">
                                <span><i class="fa-regular fa-calendar"></i> May 12, 2024</span>
                                <span><i class="fa-regular fa-user"></i> By Admin</span>
                                <span><i class="fa-regular fa-comment"></i> 5 Comments</span>
                            </div>
                        </div>

                        <div class="post-content">
                            <p class="lead">
                                The heart of the home deserves a design that reflects both style and functionality. In
                                2024, kitchen laminate trends are shifting towards a blend of natural textures and bold,
                                sophisticated colors.
                            </p>

                            <h2 class="mt-5 mb-4">1. The Rise of Matte Finishes</h2>
                            <p>
                                Gone are the days when high-gloss was the only choice for a premium look. Matte
                                laminates are taking center stage, offering a velvety touch and a fingerprint-resistant
                                surface that stays clean longer. These finishes pair perfectly with minimalist
                                handle-less cabinets.
                            </p>

                            <blockquote class="custom-blockquote my-5">
                                "Design is not just what it looks like and feels like. Design is how it works." — Steve
                                Jobs
                            </blockquote>

                            <h2 class="mb-4">2. Natural Wood Textures</h2>
                            <p>
                                Authentic wood grains remain a favorite. Advanced laminate technology now allows for
                                "sync-pore" textures that look and feel like real timber. From light oak to deep walnut,
                                these laminates bring warmth to modern kitchens.
                            </p>


                            <div class="content-image-wrapper my-5">
                                <div class="content-image">
                                    <img src="{{ asset('/images/blog2.png')}}" alt="Wood Grain Laminate" class="main-img">

                                    <div class="overlay-img-box">
                                        <img src="{{ asset('/images/p7.jpg')}}" alt="Overlay Image">
                                    </div>
                                </div>
                                <p class="text-center mt-5 text-muted">Premium textures offering a realistic and luxury
                                    wood feel.</p>
                            </div>


                            <h2 class="mb-4">3. Bold Jewel Tones</h2>
                            <p>
                                Emerald green, navy blue, and terracotta are the colors of the year. Using these as
                                accent laminates for islands or lower cabinets creates a stunning visual contrast
                                against lighter countertops.
                            </p>

                            <div class="post-footer mt-5 pt-4 border-top">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="post-tags">
                                            <a href="#"
                                                class="btn btn-sm btn-outline-secondary rounded-pill me-2">Kitchen</a>
                                            <a href="#"
                                                class="btn btn-sm btn-outline-secondary rounded-pill me-2">Laminates</a>
                                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill">Trends</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                        <div class="post-share">
                                            <span class="me-3">Share:</span>
                                            <a href="#" class="me-3 text-dark"><i
                                                    class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#" class="me-3 text-dark"><i class="fa-brands fa-twitter"></i></a>
                                            <a href="#" class="text-dark"><i class="fa-brands fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <!-- Search Widget -->
                        <div class="sidebar-widget mb-5" data-aos="fade-up" data-aos-delay="100">

                            <h4 class="widget-title">Search</h4>
                            <div class="search-box">
                                <input type="text" class="form-control" placeholder="Type here...">
                                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget mb-5" data-aos="fade-up" data-aos-delay="200">

                            <h4 class="widget-title">Categories</h4>
                            <ul class="widget-list">
                                <li><a href="#">Plywood Guide <span>(12)</span></a></li>
                                <li><a href="#">Kitchen Design <span>(8)</span></a></li>
                                <li><a href="#">Laminate Trends <span>(15)</span></a></li>
                                <li><a href="#">Hardware Solutions <span>(10)</span></a></li>
                            </ul>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="300">

                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="recent-post-item mb-4">
                                <div class="rp-img">
                                    <img src="{{ asset('/images/p4.jpg')}}" alt="">
                                </div>
                                <div class="rp-content">
                                    <a href="#">Choosing the right hardware for cabinets</a>
                                    <span>May 10, 2024</span>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <div class="rp-img">
                                    <img src="{{ asset('/images/p1.jpg')}}" alt="">
                                </div>
                                <div class="rp-content">
                                    <a href="#">Plywood vs MDF: Which is better?</a>
                                    <span>May 05, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
@endsection