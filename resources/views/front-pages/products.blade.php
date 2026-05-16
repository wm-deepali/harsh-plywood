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

                @foreach($categories as $index => $category)

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ (($index % 3) + 1) * 100 }}">

                        <div class="product-category-card">

                            <div class="p-card-img">

                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">

                            </div>

                            <div class="p-card-content">

                                <h3>{{ $category->name }}</h3>

                                <p>
                                    {{ $category->short_description }}
                                </p>

                                <a href="{{ route('product.details', $category->slug) }}" class="p-card-link">

                                    View Details

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        AOS.init({ duration: 1000, once: true });
    </script>

@endsection