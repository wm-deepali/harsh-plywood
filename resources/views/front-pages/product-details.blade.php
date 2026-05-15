@extends('layouts.app')
  <style>
        /* Creative Categories Sidebar */
        .creative-sidebar {
            background: linear-gradient(145deg, #ffffff, #fdf2fa);
            border: 1px solid rgba(151, 0, 111, 0.1);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 120px;
        }

        .creative-sidebar .sidebar-title {
            font-weight: 700;
            color: #97006f;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 12px;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        .creative-sidebar .sidebar-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #97006f;
            border-radius: 2px;
            transition: 0.4s;
        }

        .creative-sidebar:hover .sidebar-title::after {
            width: 80px;
        }

        .creative-category-list li {
            margin-bottom: 12px;
        }

        .creative-category-list li:last-child {
            margin-bottom: 0;
        }

        .creative-category-list a {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            background: #ffffff;
            border-radius: 12px;
            color: #3c2f25;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e8e2da;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .creative-category-list a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: #97006f;
            transition: 0.4s;
            z-index: -1;
            border-radius: 12px;
        }

        .creative-category-list a:hover {
            color: #ffffff;
            border-color: #97006f;
            transform: translateX(5px);
            box-shadow: 0 8px 20px rgba(151, 0, 111, 0.2);
        }

        .creative-category-list a:hover::before {
            width: 100%;
        }

        .creative-category-list a i:first-child {
            margin-right: 15px;
            font-size: 18px;
            color: #97006f;
            transition: 0.3s;
            width: 24px;
            text-align: center;
        }

        .creative-category-list a:hover i:first-child {
            color: #ffffff;
            transform: scale(1.1);
        }

        .creative-category-list a .arrow {
            margin-left: auto;
            font-size: 12px;
            opacity: 0.5;
            transition: 0.3s;
        }

        .creative-category-list a:hover .arrow {
            opacity: 1;
            transform: translateX(3px);
            color: #ffffff;
        }
    </style>

@section('content')

<!-- HERO SECTION -->
    <section class="hp-about-hero">
        <img src="{{ asset('/images/p1.jpg') }}" alt="">
        <div class="hp-hero-overlay"></div>
        <div class="container">
            <div class="hp-hero-content">
                <div class="hp-hero-subtitle">PREMIUM SERIES</div>
                <h1 class="hp-hero-title">Commercial & Marine Plywood</h1>
                <p class="hp-hero-desc">The ultimate choice for structural strength and aesthetic perfection in modern
                    interiors.</p>
            </div>
        </div>
    </section>

    <section class="product-side-section py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4" data-aos="fade-right">
                    <div class="creative-sidebar">
                        <h4 class="sidebar-title">Categories</h4>
                        <ul class="creative-category-list list-unstyled">
                            <li><a href="products.html"><i class="fa-solid fa-layer-group"></i> <span>Plywood</span> <i
                                        class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-building-columns"></i> <span>Architectural
                                        Hardware</span> <i class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-leaf"></i> <span>Laminates</span> <i
                                        class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-cubes"></i> <span>Acrylic Sheets</span> <i
                                        class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-border-all"></i> <span>MDF Panel</span> <i
                                        class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-tree"></i> <span>Wooden Flooring</span> <i
                                        class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-kitchen-set"></i> <span>Kitchen
                                        Accessories</span> <i class="fa-solid fa-chevron-right arrow"></i></a></li>
                            <li><a href="products.html"><i class="fa-solid fa-blender"></i> <span>Kitchen
                                        Appliances</span> <i class="fa-solid fa-chevron-right arrow"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">



                    <!-- ========================= -->
                    <!-- LANDSCAPE PRODUCT GALLERY -->
                    <!-- ========================= -->
                    <section class="landscape-gallery-section py-5">
                        <div class="container">
                            <div class="row mb-5 text-center" data-aos="fade-up">
                                <div class="col-lg-6 mx-auto">
                                    <div class="x-subtitle-wrap justify-content-center mb-3">
                                        <span class="x-subtitle-dot"></span>
                                        <span class="x-subtitle-text">LANDSCAPE SHOWCASE</span>
                                    </div>
                                    <h2 class="display-6 fw-bold">Immersive View</h2>
                                    <p class="text-muted">Wide-angle perspectives of our products in real-world interior
                                        applications.
                                    </p>
                                </div>
                            </div>

                            <div class="row gy-4">
                                <!-- Image 1 -->
                                <div class="col-xl-3 col-lg-4 col-md-6 gallery-item plywood">
                                    <div class="gallery-card">
                                        <img src="{{ asset('/images/p1.jpg') }}" alt="Gallery 1">
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
                                        <img src="{{ asset('/images/p2.jpg') }}" alt="Gallery 2">
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
                </div>
            </div>
        </div>
    </section>








    <!-- ========================= -->
    <!-- LIGHTBOX -->
    <!-- ========================= -->
    <div class="lightbox">
        <button class="close-btn">&times;</button>
        <button class="prev-btn"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="next-btn"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="lightbox-content">
            <img src="" alt="Lightbox Image" class="lightbox-image">
            <div class="lightbox-counter"></div>
        </div>
        <div class="lightbox-thumbnails"></div>
    </div>

     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>

@endsection