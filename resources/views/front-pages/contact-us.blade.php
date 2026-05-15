@extends('layouts.app')


@section('content')


    <section class="hp-about-hero">

        <img src="https://corgan.ancorathemes.com/wp-content/uploads/2023/10/bg-hero-copyright.jpg" alt="">

        <div class="hp-hero-overlay"></div>

        <div class="container">

            <div class="hp-hero-content">

                <div class="hp-hero-subtitle">Contact us</div>

                <h1 class="hp-hero-title">

                    Contact Harsh Plywood

                </h1>

                <p class="hp-hero-desc">

                    Reach out for plywood, laminates, hardware, or interior project support. Our team is ready to help
                    with quotes, showroom visits, and tailored solutions for your space.

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
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">

                    <div class="address-card p-4 bg-white rounded-4 shadow-sm">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-5">
                                <span class="address-label">Head Office</span>
                                <h3>Harsh Plywood Headquarters</h3>
                                <p>Visit our main office for sales, design support, and interior consultation.</p>
                                <ul class="contact-list list-unstyled">
                                    <li><i class="fa-solid fa-location-dot"></i> I-Thum Tower, Sector 62, Noida</li>
                                    <li><i class="fa-solid fa-phone"></i> +91 86567 89976</li>
                                    <li><i class="fa-regular fa-envelope"></i> info@harshplywood.com</li>
                                    <li><i class="fa-solid fa-clock"></i> Mon - Sat: 09:30 AM - 07:00 PM</li>
                                </ul>
                            </div>
                            <div class="col-lg-7">
                                <div class="map-frame ratio ratio-16x9 rounded-4 overflow-hidden">
                                    <iframe
                                        src="https://maps.google.com/maps?q=I-Thum%20Tower%20Sector%2062%20Noida&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" data-aos="fade-up" data-aos-delay="200">

                    <div class="address-card p-4 bg-white rounded-4 shadow-sm">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-5">
                                <span class="address-label">Warehouse</span>
                                <h3>Noida Distribution Centre</h3>
                                <p>Our logistics hub ensures fast delivery and easy product pickup.</p>
                                <ul class="contact-list list-unstyled">
                                    <li><i class="fa-solid fa-location-dot"></i> Sector 63, Noida</li>
                                    <li><i class="fa-solid fa-phone"></i> +91 98765 43210</li>
                                    <li><i class="fa-regular fa-envelope"></i> warehouse@harshplywood.com</li>
                                    <li><i class="fa-solid fa-clock"></i> Mon - Sat: 09:00 AM - 06:30 PM</li>
                                </ul>
                            </div>
                            <div class="col-lg-7">
                                <div class="map-frame ratio ratio-16x9 rounded-4 overflow-hidden">
                                    <iframe
                                        src="https://maps.google.com/maps?q=Sector%2063%20Noida&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" data-aos="fade-up" data-aos-delay="300">

                    <div class="address-card p-4 bg-white rounded-4 shadow-sm">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-5">
                                <span class="address-label">Showroom</span>
                                <h3>Design Showroom</h3>
                                <p>Explore our plywood finishes, laminates and kitchen accessories in person.</p>
                                <ul class="contact-list list-unstyled">
                                    <li><i class="fa-solid fa-location-dot"></i> Sector 18, Noida</li>
                                    <li><i class="fa-solid fa-phone"></i> +91 81234 56789</li>
                                    <li><i class="fa-regular fa-envelope"></i> showroom@harshplywood.com</li>
                                    <li><i class="fa-solid fa-clock"></i> Mon - Sun: 10:00 AM - 08:00 PM</li>
                                </ul>
                            </div>
                            <div class="col-lg-7">
                                <div class="map-frame ratio ratio-16x9 rounded-4 overflow-hidden">
                                    <iframe
                                        src="https://maps.google.com/maps?q=Sector%2018%20Noida&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="enquiry-form p-4 p-lg-5 bg-white rounded-4 shadow-sm" data-aos="fade-up">

                        <h3 class="mb-3">Quick Enquiry</h3>
                        <p class="mb-4">Send your details below and our team will contact you with a quote and next
                            steps.</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Phone Number" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Message" required></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary px-4 py-2">Submit Enquiry</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

@endsection