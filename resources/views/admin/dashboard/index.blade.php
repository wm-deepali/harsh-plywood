@include('admin.top-header')

<style>

.stats-card {
    transition: 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-5px);
}

.icon-box {
    width: 55px;
    height: 55px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

</style>

<div class="main-section">

@include('admin.header')

<div class="container-fluid">

    {{-- Welcome Card --}}
    <div class="row">

        <div class="col-12 mb-4">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
                 style="background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);">

                <div class="card-body p-4">

                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <h3 class="fw-bold mb-2"
                                style="color:#1e3a8a;">

                                Welcome {{ auth()->user()->name }} 👋

                            </h3>

                            <p class="mb-0 fs-6"
                               style="color:#64748b;">

                                Welcome to Harsh PlyWood Admin Dashboard.
                                Manage all website content from here.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Stats --}}
    <div class="row">

        {{-- PRODUCTS --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-primary text-white me-3">

                        <i class="fa fa-box"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalProducts }}
                        </h5>

                        <small class="text-muted">
                            Products
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- CATEGORIES --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-success text-white me-3">

                        <i class="fa fa-list"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalCategories }}
                        </h5>

                        <small class="text-muted">
                            Categories
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- BLOGS --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-warning text-white me-3">

                        <i class="fa fa-blog"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalBlogs }}
                        </h5>

                        <small class="text-muted">
                            Blogs
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- FAQ --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-danger text-white me-3">

                        <i class="fa fa-question-circle"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalFaqs }}
                        </h5>

                        <small class="text-muted">
                            FAQs
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- GALLERY IMAGES --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-info text-white me-3">

                        <i class="fa fa-image"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalGalleryImages }}
                        </h5>

                        <small class="text-muted">
                            Gallery Images
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- GALLERY CATEGORY --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-secondary text-white me-3">

                        <i class="fa fa-images"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalGalleryCategories }}
                        </h5>

                        <small class="text-muted">
                            Gallery Categories
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- HERO SLIDER --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-dark text-white me-3">

                        <i class="fa fa-sliders"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalHeroSliders }}
                        </h5>

                        <small class="text-muted">
                            Hero Slides
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- TESTIMONIALS --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-primary text-white me-3">

                        <i class="fa fa-star"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalTestimonials }}
                        </h5>

                        <small class="text-muted">
                            Testimonials
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- AWARDS --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-success text-white me-3">

                        <i class="fa fa-trophy"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalAwards }}
                        </h5>

                        <small class="text-muted">
                            Awards
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- TEAM --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-warning text-white me-3">

                        <i class="fa fa-users"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalTeamMembers }}
                        </h5>

                        <small class="text-muted">
                            Team Members
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- ENQUIRIES --}}
        <div class="col-md-3 mb-4">

            <div class="card stats-card shadow-sm border-0 rounded-4">

                <div class="card-body d-flex align-items-center">

                    <div class="icon-box bg-danger text-white me-3">

                        <i class="fa fa-envelope"></i>

                    </div>

                    <div style="margin-left:15px;">

                        <h5 class="mb-0">
                            {{ $totalEnquiries }}
                        </h5>

                        <small class="text-muted">
                            Enquiries
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

@include('admin.footer')

</div>

</div>