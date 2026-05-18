<!-- fixed-top-->
<div class="row d-none">
    <!-- success message open -->
    <div class="col-10">
        @if(session()->get('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session()->get('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- success message close -->
</div>
<div id='cssmenu'>
    <ul class="pt-0">

        <!-- Dashboard -->
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-cog"></i> Settings
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.settings.admin') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.admin') }}">
                        Admin Settings
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.settings.social') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.social') }}">
                        Social Media
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.settings.header') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.header') }}">
                        Header & Footer
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.settings.hero-sections.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.hero-sections.index') }}">
                        Hero Sections
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.settings.seo-settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.seo-settings.index') }}">
                        SEO Settings
                    </a>
                </li>

            </ul>
        </li>

        <li class="{{ request()->routeIs('admin.about.*', 'admin.pages.*', 'admin.blogs.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-folder"></i> Content Management
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.index') }}">
                        About Us
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.hrb.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.hrb.index') }}">
                        HRB Page
                    </a>
                </li>

             <!--   <li class="{{ request()->routeIs('admin.hi-style.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.hi-style.index') }}">
                        Hi-Style Page
                    </a>
                </li> -->
                <li class="{{ request()->routeIs('admin.awards.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.awards.index') }}">
                        Awards & Certifications
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.contact-us.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact-us.index') }}">
                        Contact Us
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.brands.index') }}">
                        Our Brands
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.teams.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.teams.index') }}">
                        Our Team
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ request()->routeIs('admin.product-categories.*', 'admin.products.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-box"></i> Products
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.product-categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.product-categories.index') }}">
                        Categories
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}">
                        Products
                    </a>
                </li>

            </ul>
        </li>

        <!-- FAQ & Blogs -->
        <li class="{{ request()->routeIs('admin.faqs.*', 'admin.blogs.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-blog"></i> FAQ & Blogs
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        Manage FAQ
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.index') }}">
                        Manage Blogs
                    </a>
                </li>

            </ul>
        </li>

      <!--  <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages.index') }}">
                <i class="fa-solid fa-file"></i> Pages
            </a>
        </li> -->

        <li class="{{ request()->routeIs('admin.galleries.*', 'admin.gallery-categories.*') ? 'active' : '' }}">

            <a href="#">
                <i class="fa-solid fa-image"></i> Gallery
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.gallery-categories.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.gallery-categories.index') }}">
                        Categories
                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.galleries.index') }}">
                        Gallery Images
                    </a>

                </li>

            </ul>

        </li>

        <li class="{{ request()->routeIs('admin.hero-sliders.*') ? 'active' : '' }}">

            <a href="#">
                <i class="fa-solid fa-images"></i>Home
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.hero-sliders.index') ? 'active' : '' }}">

                    <a href="{{ route('admin.hero-sliders.index') }}">
                        Manage Slides
                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.home-about.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.home-about.index') }}">
                        Home About Section
                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.counters.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.counters.index') }}">

                        Home Counter Section

                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.why-choose.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.why-choose.index') }}">

                        Home Why Choose Us

                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.home-package-section.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.home-package-section.index') }}">

                        Interior Packages Section

                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.home-video-section.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.home-video-section.index') }}">

                        Home Video Section

                    </a>

                </li>

            </ul>

        </li>
        <li
            class="{{ request()->routeIs('admin.sales_enquiries.*', 'admin.contact-enquiries.*', 'admin.hrb-enquiries.*') ? 'active' : '' }}">

            <a href="#">
                <i class="fa-solid fa-envelope"></i> Enquiries
            </a>

            <ul>
<li class="{{ request()->routeIs('admin.quote-enquiries.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.quote-enquiries.index') }}">
                        Quote Enquiry
                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.contact-enquiries.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.contact-enquiries.index') }}">
                        Contact Enquiry
                    </a>

                </li>

                <li class="{{ request()->routeIs('admin.hrb-enquiries.*') ? 'active' : '' }}">

                    <a href="{{ route('admin.hrb-enquiries.index') }}">
                        HRB Enquiry
                    </a>

                </li>

            </ul>

        </li>

        <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
            <a href="{{ route('admin.testimonials.index') }}">
                <i class="fa-solid fa-star"></i> Testimonials
            </a>
        </li>

    </ul>
</div>