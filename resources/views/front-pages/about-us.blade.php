@extends('layouts.app')


@section('content')

    <!-- HERO -->

    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">About us</div>

                <h1 class="hp-hero-title">

                    {{ $heroSection->heading ?? 'Premium Plywood & Interior Solutions' }}


                </h1>

                <p class="hp-hero-desc">

                    {{ $heroSection->sub_heading ?? 'Harsh Plywood delivers premium plywood, laminates, veneers, modular kitchen accessories, and elegant interior solutions for modern spaces.' }}

                </p>

            </div>

        </div>

    </section>



    <!-- ABOUT -->


    <section class="hp-about-section">

        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6">

                    <div class="hp-about-image">

                        <img src="{{ $introduction && $introduction->image
        ? asset('storage/' . $introduction->image)
        : 'https://corgan.ancorathemes.com/wp-content/uploads/elementor/thumbs/image-52-copyright-qfhhm7r5qdz7xaafshc5tkt8l953ryxuuzdu5un4o6.jpg' }}"
                            alt="About Image">

                        <div class="hp-experience-card">

                            <h2>

                                {{ $introduction->experience_year ?? '39+' }}

                            </h2>

                            <span>

                                {{ $introduction->experience_text ?? 'Years Experience' }}

                            </span>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="left-about">

                        <div class="hp-section-subtitle">

                            {{ $introduction->sub_heading ?? 'About Harsh Plywood' }}

                        </div>

                        <h2 class="hp-section-title">

                            {{ $introduction->heading ?? 'Complete Interior & Surface Solutions' }}

                        </h2>

                        <div class="hp-section-desc">

                            {!! $introduction->content ?? '' !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- PROCESS -->

    <section class="hp-process-section">

        <div class="container">

            <div class="hp-heading-box mv-heading">

                <span>
                    Our History
                </span>

                <h2>

                    Our History

                </h2>

                <p>

                    Journey of excellence spanning 39+ years,
                    building trust and delivering premium quality
                    in plywood and interior solutions.

                </p>

            </div>

            <div class="row g-4 mt-4">

                <div class="col-lg-12 col-md-12">

                    <div class="hp-process-card our_history_section">

                        <div class="hp-process-icon">

                            <i class="{{ $history->icon ?? 'fa-solid fa-rocket' }}"></i>

                        </div>

                        <h3>

                            {{ $history->year ?? '1985' }}

                        </h3>

                        <h4 style="font-size: 16px;
                                       color: var(--primary-color);
                                       margin-bottom: 10px;">

                            {{ $history->heading ?? 'Foundation & Beginning' }}

                        </h4>

                        <div>

                            {!! $history->content ?? '' !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- Mission Vision -->

    <section class="mv-section">

        <div class="container">

            <!-- HEADING -->

            <div class="row  justify-content-center mv-heading">
                <div class=" text-center">

                    <span>
                        Our Goal
                    </span>

                    <h2>

                        Mission & Vision

                    </h2>

                    <p>

                        Harsh Plywood is committed to delivering premium-quality
                        plywood and modern interior solutions with trust,
                        innovation, and customer satisfaction.

                    </p>

                </div>
            </div>


            <div class="row g-4 paddtingtip">

                <!-- MISSION -->

                <div class="col-lg-6">

                    <div class="mv-card">

                        <div class="mv-icon">

                            <i class="{{ $mission->icon ?? 'fa-solid fa-bullseye' }}"></i>

                        </div>

                        <div class="mv-content">

                            <span>
                                Our Mission
                            </span>

                            <h3>

                                {{ $mission->heading ?? 'Deliver Premium Interior Solutions' }}

                            </h3>

                            <div>

                                {!! $mission->content ?? '' !!}

                            </div>

                            <ul>

                                @if($mission->point_1)

                                    <li>

                                        <i class="fa-solid fa-check"></i>

                                        {{ $mission->point_1 }}

                                    </li>

                                @endif

                                @if($mission->point_2)

                                    <li>

                                        <i class="fa-solid fa-check"></i>

                                        {{ $mission->point_2 }}

                                    </li>

                                @endif

                                @if($mission->point_3)

                                    <li>

                                        <i class="fa-solid fa-check"></i>

                                        {{ $mission->point_3 }}

                                    </li>

                                @endif

                            </ul>

                        </div>

                    </div>

                </div>

                <!-- VISION -->

                <div class="col-lg-6">

                    <div class="mv-card vision-card">

                        <div class="mv-icon">

                            <i class="{{ $vision->icon ?? 'fa-solid fa-eye' }}"></i>

                        </div>

                        <div class="mv-content">

                            <span>
                                Our Vision
                            </span>

                            <h3>

                                {{ $vision->heading ?? 'Become A Trusted Industry Leader' }}

                            </h3>

                            <div>

                                {!! $vision->content ?? '' !!}

                            </div>

                            <ul>

                                @if($vision->point_1)

                                    <li>

                                        <i class="fa-solid fa-check"></i>

                                        {{ $vision->point_1 }}

                                    </li>

                                @endif

                                @if($vision->point_2)

                                    <li>

                                        <i class="fa-solid fa-check"></i>

                                        {{ $vision->point_2 }}

                                    </li>

                                @endif

                                @if($vision->point_3)

                                    <li>

                                        <i class="fa-solid fa-check"></i>

                                        {{ $vision->point_3 }}

                                    </li>

                                @endif

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- AWARD -->

    <section class="hp-award-section">

        <div class="container">

            <div class="hp-award-wrapper">

                <div class="row align-items-center g-4">

                    <div class="col-lg-5">

                        <h2 class="hp-award-title">

                            Award Winning
                            Interior &
                            Plywood Solutions

                        </h2>

                        <p class="hp-award-desc">

                            Harsh Plywood has earned trust and
                            recognition for delivering premium-quality
                            plywood and modern interior products.

                        </p>

                    </div>





                    <div class="col-lg-7">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <div class="hp-award-card">

                                    <i class="fa-solid fa-trophy"></i>

                                    <h4>
                                        Best Quality Award
                                    </h4>

                                    <p>

                                        Recognized for premium-quality
                                        plywood and durable products.

                                    </p>

                                </div>

                            </div>





                            <div class="col-md-6">

                                <div class="hp-award-card">

                                    <i class="fa-solid fa-star"></i>

                                    <h4>
                                        Customer Excellence
                                    </h4>

                                    <p>

                                        Appreciated for trusted service
                                        and customer satisfaction.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- TEAM -->

    <section class="modern-team-section">

        <div class="container">

            <!-- HEADING -->

            <div class="modern-team-heading text-center">

                <span>
                    Leadership Team
                </span>

                <h2>

                    Meet Our Experts &
                    Trusted Partners

                </h2>

                <p>

                    Our experienced team delivers premium plywood
                    and modern interior solutions with innovation,
                    quality, and trust.

                </p>

            </div>




            <div class="row g-4 justify-content-center">

                @foreach($team as $member)

                    <div class="col-lg-4 col-md-6">

                        <div class="modern-team-card">

                            <div class="modern-team-image">

                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->title }}">

                            </div>

                            <div class="modern-team-content">

                                <h3>
                                    {{ $member->title }}
                                </h3>

                                <span>
                                    {{ $member->designation }}
                                </span>

                                <p>

                                    {{ $member->short_content }}

                                </p>



                                <div class="modern-team-social">

                                    @if($member->facebook)

                                        <a href="{{ $member->facebook }}" target="_blank">

                                            <i class="fa-brands fa-facebook-f"></i>

                                        </a>

                                    @endif

                                    @if($member->linkedin)

                                        <a href="{{ $member->linkedin }}" target="_blank">

                                            <i class="fa-brands fa-linkedin-in"></i>

                                        </a>

                                    @endif

                                    @if($member->twitter)

                                        <a href="{{ $member->twitter }}" target="_blank">

                                            <i class="fa-brands fa-x-twitter"></i>

                                        </a>

                                    @endif

                                    @if($member->instagram)

                                        <a href="{{ $member->instagram }}" target="_blank">

                                            <i class="fa-brands fa-instagram"></i>

                                        </a>

                                    @endif

                                    @if($member->youtube)

                                        <a href="{{ $member->youtube }}" target="_blank">

                                            <i class="fa-brands fa-youtube"></i>

                                        </a>

                                    @endif

                                </div>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


@endsection