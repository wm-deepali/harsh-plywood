@extends('layouts.app')


@section('content')





    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">BRANDS</div>

                <h1 class="hp-hero-title">

                    {{ $heroSection->heading ?? 'Our Trusted Partners' }}
                </h1>

                <p class="hp-hero-desc">

                    {{ $heroSection->sub_heading ?? "We collaborate with the world's leading manufacturers to bring you premium quality plywood, laminates, and architectural hardware." }}


                </p>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!-- BRANDS GRID SECTION -->
    <!-- ========================= -->

    <section class="brands-section py-5">
        <div class="container">
            <div class="row g-3 g-md-4">

                @foreach($brands as $brand)

                <div class="col-xl-2 col-lg-3 col-md-4 col-6">

                        <div class="brand-card">

                            <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->brand_name }}">

                        </div>

                    </div>

                @endforeach

            </div>
        </div>
    </section>




@endsection