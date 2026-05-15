@extends('layouts.app')


@section('content')



    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">FAQ</div>

                <h1 class="hp-hero-title">

                    Frequently Asked Questions

                </h1>

                <p class="hp-hero-desc">

                    Find answers to common questions about Harsh Plywood products, orders, delivery, and installation
                    support.

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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingOne">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false"
                                aria-controls="faqCollapseOne">
                                What types of plywood do you supply?
                            </button>
                        </h2>
                        <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a full range of plywood grades including MR, BWR, marine, and special finish
                                boards for interior projects.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingTwo">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false"
                                aria-controls="faqCollapseTwo">
                                How do I request a quote?
                            </button>
                        </h2>
                        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Contact us using the details on the contact page, or submit an enquiry with your project
                                needs and we will provide a custom quote.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingThree">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false"
                                aria-controls="faqCollapseThree">
                                Do you offer delivery and installation?
                            </button>
                        </h2>
                        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes. We provide delivery across Noida and nearby areas, and can recommend installation
                                support for interior projects.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingFour">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false"
                                aria-controls="faqCollapseFour">
                                What is the typical lead time for delivery?
                            </button>
                        </h2>
                        <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Delivery times vary by product and location, but most orders are delivered within 3-7
                                business days after confirmation.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingFive">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false"
                                aria-controls="faqCollapseFive">
                                Can I visit your showroom before placing an order?
                            </button>
                        </h2>
                        <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely. Our showroom is open to visitors and is the best place to see finished
                                samples and discuss your interior requirements.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingSix">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseSix" aria-expanded="false"
                                aria-controls="faqCollapseSix">
                                Do you provide custom cutting or sizing?
                            </button>
                        </h2>
                        <div id="faqCollapseSix" class="accordion-collapse collapse" aria-labelledby="faqHeadingSix"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we can supply custom-cut plywood and laminate sheets to fit your project
                                specifications. Contact us to discuss your dimensions.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingSeven">
                            <button class="accordion-button faq-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqCollapseSeven" aria-expanded="false"
                                aria-controls="faqCollapseSeven">
                                What warranty do your products have?
                            </button>
                        </h2>
                        <div id="faqCollapseSeven" class="accordion-collapse collapse" aria-labelledby="faqHeadingSeven"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our plywood and laminate products come with manufacturer-backed warranties. Warranty
                                details vary by product, so ask our team for the exact coverage.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection