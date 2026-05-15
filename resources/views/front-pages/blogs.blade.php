@extends('layouts.app')


@section('content')



    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">INSIGHTS</div>

                <h1 class="hp-hero-title">

                    Latest From Our Blog

                </h1>

                <p class="hp-hero-desc">
                    Stay updated with the latest trends, innovations, and insights in the world of plywood and interior
                    design.
                </p>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- BLOG LISTING SECTION -->
    <!-- ========================= -->

    <section class="blog-listing-section py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Blog 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">

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
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">

                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('/images/blog1.png')}}" alt="Blog 2">
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
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">

                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('/images/p4.jpg') }}" alt="Blog 3">
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

                <!-- Blog 4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">

                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('/images/blog2.png') }}" alt="Blog 4">
                            <div class="blog-date">
                                <span>08</span>
                                <small>May</small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-tag"></i> Design Insights</span>
                            </div>
                            <h3 class="blog-card-title">
                                <a href="blog-details.html">Exquisite Wood Grains: The Plywood Advantage</a>
                            </h3>
                            <p class="blog-text">
                                Discover how natural wood grains can add character and warmth to your modern interior
                                design...
                            </p>
                            <a href="blog-details.html" class="blog-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog 5 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">

                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('/images/p2.jpg') }}" alt="Blog 5">
                            <div class="blog-date">
                                <span>05</span>
                                <small>May</small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-tag"></i> Office Spaces</span>
                            </div>
                            <h3 class="blog-card-title">
                                <a href="blog-details.html">Durability Meets Design in Modern Offices</a>
                            </h3>
                            <p class="blog-text">
                                Why high-quality plywood and laminates are the perfect choice for busy professional
                                environments...
                            </p>
                            <a href="blog-details.html" class="blog-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog 6 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">

                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="{{ asset('/images/p5.jpg') }}" alt="Blog 6">
                            <div class="blog-date">
                                <span>02</span>
                                <small>May</small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-tag"></i> Luxury Flooring</span>
                            </div>
                            <h3 class="blog-card-title">
                                <a href="blog-details.html">Wooden Flooring: Timeless Elegance</a>
                            </h3>
                            <p class="blog-text">
                                A comprehensive guide to choosing wooden flooring that complements your interior
                                theme...
                            </p>
                            <a href="blog-details.html" class="blog-btn">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination custom-pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="fa-solid fa-chevron-right"></i></a></li>
                        </ul>
                    </nav>
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