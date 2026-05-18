@extends('layouts.app')


@section('content')


    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">Contact us</div>

                <h1 class="hp-hero-title">

                    {{ $heroSection->heading ?? 'Contact Harsh Plywood' }}

                </h1>

                <p class="hp-hero-desc">

                    {{ $heroSection->sub_heading ?? 'Reach out for plywood, laminates, hardware, or interior project support.' }}

                </p>

            </div>

        </div>

    </section>




    <section class="contact-page-section">
        <div class="container">
            <!-- <div class="row mb-5">
                                <div class="col text-center">
                                    <span class="section-subtitle">Contact Us</span>
                                    <h2 class="section-title">Multiple locations, one quick way to reach us</h2>
                                    <p class="section-desc">Choose the nearest Harsh Plywood address and view the map, or send us a quick enquiry using the form below.</p>
                                </div>
                            </div> -->

            <div class="row gy-4">

                @foreach($contacts as $index => $contact)

                    <div class="col-12">

                        <div class="address-card p-4 bg-white rounded-4 shadow-sm">

                            <div class="row g-4 align-items-center">

                                <div class="col-lg-5">

                                    <span class="address-label">

                                        {{ $contact->type }}

                                    </span>

                                    <h3>

                                        {{ $contact->title }}

                                    </h3>

                                    <p>

                                        {{ $contact->description }}

                                    </p>

                                    <ul class="contact-list list-unstyled">

                                        <li>
                                            <i class="fa-solid fa-location-dot"></i>

                                            {{ $contact->address }}
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-phone"></i>

                                            {{ $contact->phone }}
                                        </li>

                                        <li>
                                            <i class="fa-regular fa-envelope"></i>

                                            {{ $contact->email }}
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-clock"></i>

                                            {{ $contact->timing }}
                                        </li>

                                    </ul>

                                </div>

                                <div class="col-lg-7">

                                    <div class="map-frame ratio ratio-16x9 rounded-4 overflow-hidden">

                                        {!! $contact->map_iframe !!}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="enquiry-form p-4 p-lg-5 bg-white rounded-4 shadow-sm">
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
                        <h3 class="mb-3">Quick Enquiry</h3>
                        <p class="mb-4">Send your details below and our team will contact you with a quote and next
                            steps.</p>

                        <form id="contactForm" method="POST" action="{{ route('contact.enquiry') }}">

                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">

                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Your Name *" value="{{ old('name') }}">

                                    @error('name')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                                <div class="col-md-6">

                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Your Email *"
                                        value="{{ old('email') }}">

                                    @error('email')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                                <div class="col-md-6">

                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Phone Number *" value="{{ old('phone') }}">

                                    @error('phone')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                                <div class="col-md-6">

                                    <input type="text" name="subject"
                                        class="form-control @error('subject') is-invalid @enderror" placeholder="Subject *"
                                        value="{{ old('subject') }}">

                                    @error('subject')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                                <div class="col-12">

                                    <textarea name="message" rows="5"
                                        class="form-control @error('message') is-invalid @enderror"
                                        placeholder="Message *">{{ old('message') }}</textarea>

                                    @error('message')

                                        <div class="invalid-feedback">

                                            {{ $message }}

                                        </div>

                                    @enderror

                                </div>

                                {{-- Google Captcha --}}
                                <div class="col-12">

                                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">

                                    </div>

                                    @error('g-recaptcha-response')

                                        <small class="text-danger d-block mt-2">

                                            {{ $message }}

                                        </small>

                                    @enderror

                                </div>

                                <div class="col-12 text-end">

                                    <button type="submit" class="btn btn-primary px-4 py-2">

                                        Submit Enquiry

                                    </button>

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @if ($errors->any() || session('success'))

        <script>

            window.addEventListener('load', function () {

                const formSection =
                    document.getElementById('contactForm');

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