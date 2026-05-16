@extends('layouts.app')


@section('content')


    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">
                    INSIGHTS
                </div>

                <h1 class="hp-hero-title">

                    {{ $heroSection->heading ?? 'Latest From Our Blog' }}

                </h1>

                <p class="hp-hero-desc">

                    {{ $heroSection->sub_heading ?? 'Stay updated with the latest trends, innovations, and insights in the world of plywood and interior design.' }}

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

                @foreach($blogs as $blog)

                    <div class="col-lg-4 col-md-6" data-aos="fade-up">

                        <div class="blog-card">

                            <div class="blog-image">

                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">

                                <div class="blog-date">

                                    <span>
                                        {{ $blog->created_at->format('d') }}
                                    </span>

                                    <small>
                                        {{ $blog->created_at->format('M') }}
                                    </small>

                                </div>

                            </div>

                            <div class="blog-content">

                                <div class="blog-meta">

                                    <span>
                                        <i class="fa-solid fa-tag"></i>
                                        Blog
                                    </span>

                                </div>

                                <h3 class="blog-card-title">

                                    <a href="{{ route('blog.details', $blog->slug) }}">

                                        {{ $blog->title }}

                                    </a>

                                </h3>

                                <p class="blog-text">

                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 120) }}

                                </p>

                                <a href="{{ route('blog.details', $blog->slug) }}" class="blog-btn">

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <!-- PAGINATION -->
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">

                    <nav aria-label="Page navigation">

                        <ul class="pagination custom-pagination">

                            {{-- Previous --}}
                            @if ($blogs->onFirstPage())

                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </span>
                                </li>

                            @else

                                <li class="page-item">
                                    <a class="page-link" href="{{ $blogs->previousPageUrl() }}">

                                        <i class="fa-solid fa-chevron-left"></i>

                                    </a>
                                </li>

                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)

                                <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">

                                    <a class="page-link" href="{{ $url }}">

                                        {{ $page }}

                                    </a>

                                </li>

                            @endforeach

                            {{-- Next --}}
                            @if ($blogs->hasMorePages())

                                <li class="page-item">
                                    <a class="page-link" href="{{ $blogs->nextPageUrl() }}">

                                        <i class="fa-solid fa-chevron-right"></i>

                                    </a>
                                </li>

                            @else

                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </span>
                                </li>

                            @endif

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