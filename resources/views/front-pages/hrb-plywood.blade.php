@extends('layouts.app')


@section('content')



    <!-- ============================================== -->
    <div class='hrb-landing-page'>
        <!-- ULTRA CREATIVE HERO SECTION -->
        <!-- ============================================== -->


        <section class="ultra-hero">
            <div class="ultra-hero-img" style="background-image:url('{{ $hrb && $hrb->hero_image
        ? asset('storage/' . $hrb->hero_image)
        : asset('images/p1.jpg') }}')">
            </div>
            <div class="ultra-hero-overlay"></div>
            <div class="container ultra-hero-content">
                <div class="row">
                    <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1500">
                        <div class="ultra-badge"><i
                                class="fa-solid fa-crown me-2"></i>{{ $hrb->hero_sub_heading ?? 'Premium Sister Concern' }}
                        </div>
                        <h1 class="ultra-title">{{ $hrb->hero_heading ?? 'Premium Quality Plywood' }}<br></h1>
                        <p class="ultra-desc">
                            {{ $hrb->hero_description ?? 'Discover the ultimate collection of high-grade plywood, architectural hardware, and designer laminates engineered for perfection and endurance.' }}
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ $hrb->hero_button_link ?? '#ultra-products' }}"
                                class="ultra-btn text-decoration-none">

                                {{ $hrb->hero_button_text ?? 'Explore Products' }}

                            </a>

                            <a href="#ultra-contact" class="ultra-btn-outline text-decoration-none">

                                Request Quote

                            </a>'
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- ULTRA CREATIVE ABOUT SECTION -->
        <!-- ============================================== -->


        <section class="py-5 bg-light mt-5" id="ultra-about">
            <div class="container py-5">
                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6" data-aos="zoom-out-right">
                        <div class="about-grid">
                            <img src="{{ $hrb && $hrb->intro_image_1
        ? asset('storage/' . $hrb->intro_image_1)
        : asset('/images/p1.jpg') }}" class="img-main">

                            <img src="{{ $hrb && $hrb->intro_image_2
        ? asset('storage/' . $hrb->intro_image_2)
        : asset('/images/p2.jpg') }}" class="img-float">

                            <!-- Floating Logo Badge -->
                            <div class="position-absolute bg-white rounded-circle shadow-lg d-flex flex-column justify-content-center align-items-center"
                                style="width: 120px; height: 120px; top: -30px; left: -20px; z-index: 3;">
                                <h2 class="mb-0 fw-bold"
                                    style="font-family: serif; color: var(--wood-primary); font-size: 32px; line-height: 1;">
                                    HRB</h2>
                                <p class="mb-0 text-dark text-center"
                                    style="font-size: 8px; font-weight: 700; line-height: 1.2; letter-spacing: 0.5px;">
                                    HARI RAM <br>& BROTHERS</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5 mt-5 mt-lg-0" data-aos="fade-left">
                        <div class="about-text-box">
                            <h6 class="hrb-text-accent fw-bold text-uppercase tracking-wide mb-2"
                                style="letter-spacing: 2px;"> {{ $hrb->intro_sub_title ?? 'The HRB Story' }}
                            </h6>
                            <h2 class="display-6 fw-bold mb-4">

                                {{ $hrb->intro_heading ?? 'Mastering the Art of Interior Excellence' }}

                            </h2>

                            <p class="text-muted mb-4 fs-5" style="line-height: 1.7;">
                                {!! $hrb->intro_content ?? '' !!}
                            </p>
                            <div class="row gy-3">

                                @foreach($introFeatures as $feature)

                                    <div class="col-sm-6">

                                        <div class="d-flex align-items-center gap-3">

                                            <div class="text-white rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 45px; height: 45px; background-color: var(--wood-primary);">

                                                <i class="{{ $feature->icon }}"></i>

                                            </div>

                                            <h6 class="fw-bold mb-0">

                                                {{ $feature->title }}

                                            </h6>

                                        </div>

                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- ULTRA CREATIVE PRODUCTS SECTION -->
        <!-- ============================================== -->

        <section class="py-5" id="ultra-products">
            <div class="container py-5">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="hrb-text-accent fw-bold text-uppercase tracking-wide mb-2" style="letter-spacing: 2px;">
                        What We
                        Offer</h6>
                    <h2 class="fw-bold display-5 mb-3">Our Core Collections</h2>
                </div>

                <div class="row gy-4">

                    @foreach($offers as $index => $offer)

                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">

                                    <div class="product-modern-card h-100">

                                        <div class="overflow-hidden">

                                            <img src="{{ $offer->image
                        ? asset('storage/' . $offer->image)
                        : asset('/images/p1.jpg') }}" class="product-modern-img" alt="{{ $offer->title }}">

                                        </div>

                                        <div class="product-modern-content">

                                            <div class="product-modern-icon">

                                                <i class="{{ $offer->icon }}"></i>

                                            </div>

                                            <h4 class="fw-bold mb-3">

                                                {{ $offer->title }}

                                            </h4>

                                            <p class="text-muted mb-4">

                                                {{ $offer->short_content }}

                                            </p>

                                            <a href="#ultra-contact"
                                                class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1">

                                                Explore More

                                                <i class="fa-solid fa-arrow-right ms-2" style="color: var(--wood-primary);"></i>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                    @endforeach

                </div>

            </div>
        </section>

        <!-- ============================================== -->

        <!-- ============================================== -->
        <!-- WHY CHOOSE US SECTION -->
        <!-- ============================================== -->
        <section class="py-5" id="why-choose-us" style="background-color: var(--wood-bg);">
            <div class="container py-5">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="fw-bold text-uppercase tracking-wide mb-2 hrb-text-accent" style="letter-spacing: 2px;">
                        Our Strengths</h6>
                    <h2 class="fw-bold display-5 mb-3" style="color: var(--wood-primary);">Why Choose Us</h2>
                </div>
                <div class="row gy-4 justify-content-center">

                    @foreach($whyChoose as $index => $item)

                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">

                            <div class="feature-card">

                                @if($item->image)

                                    <div class="mb-4">

                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="img-fluid rounded">

                                    </div>

                                @else

                                    <div class="feature-icon-wrapper">

                                        <i class="{{ $item->icon }}"></i>

                                    </div>

                                @endif

                                <h4 class="fw-bold mb-3" style="color: var(--wood-primary);">

                                    {{ $item->title }}

                                </h4>

                                <p class="text-muted mb-0">

                                    {{ $item->short_content }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>
            </div>
        </section>

        <!-- ULTRA CREATIVE LEGACY SECTION -->
        <!-- ============================================== -->

        <section class="legacy-section">
            <div class="legacy-pattern"></div>
            <div class="container position-relative z-index-2">
                <div class="row justify-content-center mb-5" data-aos="fade-up">
                    <div class="col-lg-8 text-center">
                        <div class="mx-auto mb-4 bg-white rounded-circle d-flex flex-column justify-content-center align-items-center shadow-sm"
                            style="width: 100px; height: 100px;">
                            <h2 class="mb-0 fw-bold"
                                style="font-family: serif; color: var(--wood-primary); font-size: 26px; line-height: 1;">
                                HRB</h2>
                            <p class="mb-0 text-dark text-center"
                                style="font-size: 7px; font-weight: 700; line-height: 1.2; letter-spacing: 0.5px;">HARI
                                RAM <br>& BROTHERS</p>
                        </div>

                        <h2 class="display-5 fw-bold mb-4">

                            {{ $hrb->counter_heading ?? 'The HRB Legacy' }}

                        </h2>

                        <p class="fs-5 text-white-50" style="line-height: 1.8;">

                            {{ $hrb->counter_sub_heading ?? 'HRB stands as a hallmark of unwavering trust and groundbreaking innovation. We empower architects, designers, and homeowners with materials that redefine spatial aesthetics.' }}

                        </p>
                    </div>
                </div>
                <div class="row gy-4 text-center">

                    @foreach($counters as $index => $counter)

                        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">

                            <div class="legacy-card">

                                <i class="{{ $counter->icon }} fs-1 mb-3" style="color: #fdf2fa;"></i>

                                <div class="legacy-stat">

                                    {{ $counter->counter_value }}

                                </div>

                                <p class="text-white-50 text-uppercase letter-spacing-1 mb-0">

                                    {{ $counter->counter_title }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>
            </div>
        </section>

        <!-- ============================================== -->

        <!-- ============================================== -->
        <!-- OUR PREMIUM BRANDS SECTION -->
        <!-- ============================================== -->






        <section class="client-logo-section py-5">

            <div class="container-fluid px-lg-5">

                <!-- HEADING -->



                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="fw-bold text-uppercase tracking-wide mb-2 hrb-text-accent" style="letter-spacing: 2px;">
                        Trusted Clients</h6>
                    <h2 class="fw-bold display-5 mb-3" style="color: var(--wood-primary);">Brands We Worked With</h2>
                </div>



                <!-- SWIPER -->

                <div class="swiper clientLogoSwiper">

                    <div class="swiper-wrapper">

                        @foreach($brands as $brand)

                            <div class="swiper-slide">

                                <div class="client-logo-item">

                                    <img src="{{ asset('storage/' . $brand->brand_logo) }}" alt="{{ $brand->brand_name }}">

                                </div>

                            </div>

                        @endforeach

                    </div>
                </div>
            </div>

        </section>



        <!-- ULTRA CREATIVE CONTACT SECTION -->
        <!-- ============================================== -->

        <section class="pb-5 bg-light" id="ultra-contact">
            <div class="container pb-5">
                <div class="contact-ultra-wrapper" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <div class="contact-ultra-info d-flex flex-column justify-content-center">
                                <div class="contact-ultra-info-content">
                                    <h2 class="fw-bold mb-4 text-white">

                                        {{ $hrb->contact_heading ?? "Let's Create Together." }}

                                    </h2>

                                    <p class="text-white-50 mb-5 fs-5">

                                        {{ $hrb->contact_description ?? 'Ready to source the best materials for your next project? Our team is here to help.' }}

                                    </p>

                                    <div class="d-flex align-items-center gap-4 mb-4">
                                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center fs-4"
                                            style="width: 60px; height: 60px; color: var(--wood-primary);">
                                            <i class="fa-solid fa-phone-volume"></i>
                                        </div>
                                        <div>
                                            <p class="text-white-50 mb-1 small text-uppercase">Call Us Directly</p>
                                            <h5 class="fw-bold mb-0 text-white">

                                                {{ $hrb->contact_phone ?? '+91 8656789976' }}

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center fs-4"
                                            style="width: 60px; height: 60px; color: var(--wood-primary);">
                                            <i class="fa-solid fa-envelope-open-text"></i>
                                        </div>
                                        <div>
                                            <p class="text-white-50 mb-1 small text-uppercase">Email Us</p>
                                            <h5 class="fw-bold mb-0 text-white">

                                                {{ $hrb->contact_email ?? 'info@harshplywood.com' }}

                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 p-4 p-md-5 d-flex align-items-center">
                            <div class="w-100 p-md-4">
                                <h3 class="fw-bold mb-4">Send a Quick Enquiry</h3>
                                @if(session('success'))

                                    <div class="alert alert-success alert-dismissible fade show">

                                        {{ session('success') }}

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    </div>

                                @endif

                                @if ($errors->any())

                                    <div class="alert alert-danger alert-dismissible fade show">

                                        <ul class="mb-0">

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    </div>

                                @endif
                                <form id="hrbContactForm" method="POST" action="{{ route('hrb.enquiry') }}">

                                    @csrf
                                    <div class="row gy-4">

                                        <div class="col-md-6">

                                            <label class="ultra-label">
                                                Name
                                            </label>

                                            <input type="text" name="name"
                                                class="form-control ultra-input @error('name') is-invalid @enderror"
                                                placeholder="John Doe" value="{{ old('name') }}">

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-6">

                                            <label class="ultra-label">
                                                Email Address
                                            </label>

                                            <input type="email" name="email"
                                                class="form-control ultra-input @error('email') is-invalid @enderror"
                                                placeholder="john@example.com" value="{{ old('email') }}">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-6">

                                            <label class="ultra-label">
                                                Phone Number
                                            </label>

                                            <input type="tel" name="phone"
                                                class="form-control ultra-input @error('phone') is-invalid @enderror"
                                                placeholder="+91" value="{{ old('phone') }}">

                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-6">

                                            <label class="ultra-label">
                                                Subject
                                            </label>

                                            <input type="text" name="subject"
                                                class="form-control ultra-input @error('subject') is-invalid @enderror"
                                                placeholder="Subject" value="{{ old('subject') }}">

                                            @error('subject')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-12">

                                            <label class="ultra-label">
                                                Your Requirement
                                            </label>

                                            <textarea name="message"
                                                class="form-control ultra-input @error('message') is-invalid @enderror"
                                                rows="3"
                                                placeholder="Tell us about your project...">{{ old('message') }}</textarea>

                                            @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-12 mt-5">

                                            <button type="submit" class="ultra-btn border-0 w-100 py-3 text-white"
                                                style="background: var(--wood-primary);">

                                                Submit Enquiry

                                                <i class="fa-solid fa-arrow-right ms-2"></i>

                                            </button>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </div>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>

    @if ($errors->any() || session('success'))

        <script>

            window.addEventListener('load', function () {

                const formSection =
                    document.getElementById('hrbContactForm');

                if (formSection) {

                    formSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                }

            });

        </script>

    @endif

@endsection