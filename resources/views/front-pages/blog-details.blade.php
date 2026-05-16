@extends('layouts.app')


@section('content')


    <section class="hp-about-hero">

        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">
                    INSIGHTS
                </div>

                <h1 class="hp-hero-title">

                    {{ $blog->title }}

                </h1>

                <p class="hp-hero-desc">

                    {{ $blog->short_description }}

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

                                <span>
                                    <i class="fa-regular fa-calendar"></i>

                                    {{ $blog->created_at->format('M d, Y') }}

                                </span>

                                <span>
                                    <i class="fa-regular fa-user"></i>

                                    By Admin

                                </span>

                            </div>
                        </div>

                        <div class="post-content">

                            {!! $blog->content !!}

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
                            @foreach($recentBlogs as $item)

    <div class="recent-post-item mb-4">

        <div class="rp-img">

            <img src="{{ asset('storage/' . $item->image) }}"
                 alt="{{ $item->title }}">

        </div>

        <div class="rp-content">

            <a href="{{ route('blog.details', $item->slug) }}">

                {{ \Illuminate\Support\Str::limit($item->title, 50) }}

            </a>

            <span>

                {{ $item->created_at->format('M d, Y') }}

            </span>

        </div>

    </div>

@endforeach
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