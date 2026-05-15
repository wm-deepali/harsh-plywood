@extends('layouts.app')


@section('content')

    <section class="hp-about-hero">
        <img src="{{ asset('images/p1.jpg')}}" alt="">
        <div class="hp-hero-overlay"></div>
        <div class="container">
            <div class="hp-hero-content">
                <div class="hp-hero-subtitle">PREMIUM QUALITY</div>
                <h1 class="hp-hero-title">Our Product Collection</h1>
                <p class="hp-hero-desc">Discover the finest selection of plywood, laminates, and architectural hardware
                    crafted for elegance and durability.</p>
            </div>
        </div>
    </section>

    <!-- ========================= -->
    <!-- PRODUCTS GRID -->
    <!-- ========================= -->

    <section class="products-grid-section py-5">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <div class="x-subtitle-wrap justify-content-center mb-3">
                        <span class="x-subtitle-dot"></span>
                        <span class="x-subtitle-text">CATEGORIES</span>
                    </div>
                    <h2 class="x-about-title">Explore Our Range</h2>
                </div>
            </div>

            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-category-card">
                        <div class="p-card-img">
                            <img src="{{ asset('/images/p1.jpg')}}" alt="Plywood">
                        </div>
                        <div class="p-card-content">
                            <h3>Plywood</h3>
                            <p>High-grade commercial and marine plywood for all construction needs.</p>
                            <a href="products-details.html" class="p-card-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-category-card">
                        <div class="p-card-img">
                            <img src="{{ asset('/images/p2.jpg')}}" alt="Hardware">
                        </div>
                        <div class="p-card-content">
                            <h3>Architectural Hardware</h3>
                            <p>Premium handles, locks, and fittings that redefine luxury interiors.</p>
                            <a href="products-details.html" class="p-card-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-category-card">
                        <div class="p-card-img">
                            <img src="{{ asset('/images/p3.jfif')}}" alt="Laminates">
                        </div>
                        <div class="p-card-content">
                            <h3>Laminates</h3>
                            <p>Exquisite decorative laminates with a wide range of colors and textures.</p>
                            <a href="products-details.html" class="p-card-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-category-card">
                        <div class="p-card-img">
                            <img src="{{ asset('/images/p4.jpg')}}" alt="Acrylic">
                        </div>
                        <div class="p-card-content">
                            <h3>Acrylic Sheets</h3>
                            <p>Premium acrylic solutions for modular kitchens and modern cabinets.</p>
                            <a href="products-details.html" class="p-card-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-category-card">
                        <div class="p-card-img">
                            <img src="{{ asset('/images/p5.jpg')}}" alt="Flooring">
                        </div>
                        <div class="p-card-content">
                            <h3>Wooden Flooring</h3>
                            <p>Durable and stylish wooden flooring options for a warm home feel.</p>
                            <a href="products-details.html" class="p-card-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-category-card">
                        <div class="p-card-img">
                            <img src="{{ asset('/images/p6.jpg')}}" alt="Kitchen">
                        </div>
                        <div class="p-card-content">
                            <h3>Kitchen Accessories</h3>
                            <p>Smart storage solutions and accessories for the modern kitchen.</p>
                            <a href="products-details.html" class="p-card-link">View Details <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
    
@endsection