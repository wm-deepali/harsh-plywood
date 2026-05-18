@extends('layouts.app')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg"
             alt="{{ $page->title }}">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">

                    {{ $page->title }}

                </div>

                <h1 class="hp-hero-title">

                    {{ $page->title }}

                </h1>

                <p class="hp-hero-desc">

                    {{ $page->meta_description }}

                </p>

            </div>

        </div>

    </section>

    {{-- PAGE CONTENT --}}
    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-lg-10 mx-auto">

                    <div class="dynamic-page-wrapper">

                        {!! $page->content !!}

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection