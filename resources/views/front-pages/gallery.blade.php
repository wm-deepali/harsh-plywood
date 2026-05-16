@extends('layouts.app')


@section('content')

    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">GALLERY</div>

                <h1 class="hp-hero-title">

                    {{ $heroSection->heading ?? 'Showcasing Our Finest Projects' }}


                </h1>

                <p class="hp-hero-desc">

                    {{ $heroSection->sub_heading ?? 'Discover the elegance and durability of our premium plywood, laminates, and architectural solutions through our curated project gallery.' }}


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

                        <button class="filter-btn activebutton" data-filter="all">

                            All

                        </button>

                        @foreach($galleryCategories as $category)

                            <button class="filter-btn" data-filter="{{ Str::slug($category->name) }}">

                                {{ $category->name }}

                            </button>

                        @endforeach

                    </div>

                </div>
            </div>


            <div class="row gy-4">

                @foreach($galleries as $gallery)

                    <div class="col-xl-3 col-lg-4 col-md-6 gallery-item {{ Str::slug($gallery->category->name ?? '') }}">

                        <div class="gallery-card" data-images='@json([asset("storage/" . $gallery->image)])'>

                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">

                            <div class="gallery-overlay">

                                <div class="gallery-plus-icon">
                                    <i class="fa-solid fa-plus"></i>
                                </div>

                                <div class="gallery-content">

                                    <h3>
                                        {{ $gallery->title }}
                                    </h3>

                                    <span>
                                        {{ $gallery->category->name ?? '' }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

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