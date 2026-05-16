@extends('layouts.app')


@section('content')



    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">FAQ</div>

                <h1 class="hp-hero-title">

                   {{ $heroSection->heading ?? 'Frequently Asked Questions' }}

                </h1>

                <p class="hp-hero-desc">

                 {{ $heroSection->sub_heading ?? 'Find answers to common questions about Harsh Plywood products, orders, delivery, and installation
                    support.' }}

                </p>

            </div>

        </div>

    </section>

    <section class="faq-section py-5">
        <div class="col-md-8 mx-auto">
            <div class="container">
                <div class="row mb-4">
                    <div class="col text-center">
                        <h2 class="hp-section-title">Common Questions</h2>
                        <p class="hp-section-desc">Browse answers to the most common questions about our plywood,
                            laminates, delivery service, and project support.</p>
                    </div>
                </div>
                <div class="accordion" id="faqAccordion">

                    @foreach($faqs as $key => $faq)

                        <div class="accordion-item">

                            <h2 class="accordion-header" id="faqHeading{{ $key }}">

                                <button class="accordion-button faq-accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $key }}" aria-expanded="false"
                                    aria-controls="faqCollapse{{ $key }}">

                                    {{ $faq->question }}

                                </button>

                            </h2>

                            <div id="faqCollapse{{ $key }}" class="accordion-collapse collapse"
                                aria-labelledby="faqHeading{{ $key }}" data-bs-parent="#faqAccordion">

                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection