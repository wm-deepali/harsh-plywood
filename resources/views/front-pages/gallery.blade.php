@extends('layouts.app')


@section('content')

   <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">GALLERY</div>

                <h1 class="hp-hero-title">

                    Showcasing Our Finest Projects

                </h1>

                <p class="hp-hero-desc">

                    Discover the elegance and durability of our premium plywood, laminates, and architectural solutions
                    through our curated project gallery.

                </p>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- GALLERY SECTION -->
    <!-- ========================= -->

    <section class="gallery-section py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="gallery-filters mb-4">
                        <button class="filter-btn activebutton" data-filter="all">All</button>
                        <button class="filter-btn" data-filter="plywood">Plywood</button>
                        <button class="filter-btn" data-filter="hardware">Hardware</button>
                        <button class="filter-btn" data-filter="laminates">Laminates</button>
                    </div>
                </div>
            </div>


            <div class="row gy-4">
                <!-- Image 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item plywood">
                    <div class="gallery-card">
                        <img src="{{ asset('images/p1.jpg')}}" alt="Gallery 1">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Premium Plywood</h3>
                                <span>Core Strength</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item laminates">
                    <div class="gallery-card">
                        <img src="{{ asset('/images/p2.jpg')}}" alt="Gallery 2">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Stylish Laminates</h3>
                                <span>Elegant Finish</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item hardware">
                    <div class="gallery-card">
                        <img src="{{ asset('/images/p3.jfif') }}" alt="Gallery 3">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Modern Hardware</h3>
                                <span>Perfect Details</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item plywood">
                    <div class="gallery-card">
                        <img src="{{ asset('/images/p4.jpg') }}" alt="Gallery 4">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Interior Solutions</h3>
                                <span>Modern Living</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 5 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item hardware">
                    <div class="gallery-card">
                        <img src="{{ asset('/images/p5.jpg') }}" alt="Gallery 5">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Luxury Fittings</h3>
                                <span>Architectural Hardware</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 6 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item laminates">
                    <div class="gallery-card">
                        <img src="{{ asset('/images/p6.jpg') }}" alt="Gallery 6">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Texture & Tone</h3>
                                <span>Designer Series</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 7 -->
                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item plywood">
                    <div class="gallery-card">
                        <img src="{{ asset('/images/p7.jpg') }}" alt="Gallery 7">
                        <div class="gallery-overlay">
                            <div class="gallery-plus-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="gallery-content">
                                <h3>Timber Excellence</h3>
                                <span>Quality Plywood</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ========================= -->
    <!-- LIGHTBOX -->
    <!-- ========================= -->

    <div class="lightbox">
        <span class="close-btn">&times;</span>
        <span class="prev-btn"><i class="fa-solid fa-chevron-left"></i></span>
        <img class="lightbox-image" src="" alt="Lightbox Image">
        <span class="next-btn"><i class="fa-solid fa-chevron-right"></i></span>
        <div class="lightbox-counter">1 / 7</div>
        <div class="lightbox-thumbnails"></div>
    </div>


@endsection