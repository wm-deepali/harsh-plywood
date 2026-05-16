@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Awards')

@section('meta_description', $seo->meta_description ?? '')

@section('content')

    <!-- HERO -->

    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg"
             alt="Awards">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">

                    ACHIEVEMENTS

                </div>

                <h1 class="hp-hero-title">

                    {{ $heroSection->heading ?? 'Our Awards & Recognition' }}

                </h1>

                <p class="hp-hero-desc">

                    {{ $heroSection->sub_heading ?? 'Celebrating excellence, trust, and achievements earned through dedication and quality craftsmanship.' }}

                </p>

            </div>

        </div>

    </section>

    <!-- AWARDS -->

    <section class="blog-section py-5">

        <div class="container">

            <div class="row g-4">

                @foreach($awards as $award)

                    <div class="col-lg-3 col-md-6">

                        <div class="blog-card h-100">

                            <div class="blog-image">

                                <img src="{{ asset('storage/' . $award->image) }}"
                                     alt="{{ $award->title }}">

                            </div>

                            <div class="blog-content text-center">

                                <h3 class="blog-card-title mb-0">

                                    {{ $award->title }}

                                </h3>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

@endsection