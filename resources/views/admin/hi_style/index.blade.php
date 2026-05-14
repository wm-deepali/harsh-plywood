{{-- resources/views/admin/hi_style/index.blade.php --}}

@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        {{-- Breadcrumb --}}
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Hi Style Page Management
                    </li>

                </ol>

            </div>

        </div>

        {{-- Content --}}
        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage Hi Style Sections</strong>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover mb-0">

                            <thead class="thead-light">

                                <tr>

                                    <th width="80">
                                        #
                                    </th>

                                    <th width="250">
                                        Section
                                    </th>

                                    <th>
                                        Details
                                    </th>

                                    <th width="150">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                {{-- HERO SECTION --}}
                                <tr>

                                    <td>1</td>

                                    <td>
                                        <strong>Hero Section</strong>
                                    </td>

                                    <td>
                                        Heading,
                                        Sub Heading,
                                        Short Description,
                                        Button Text,
                                        Hero Image
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style.hero.edit') }}" class="btn btn-sm btn-primary">

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- INTRODUCTION --}}
                                <tr>

                                    <td>2</td>

                                    <td>
                                        <strong>Introduction Section</strong>
                                    </td>

                                    <td>
                                        2 Images,
                                        Sub Title,
                                        Heading,
                                        Detail Content,
                                        Features with Icons
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style.intro.edit') }}" class="btn btn-sm btn-primary">

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- WHAT WE OFFER --}}
                                <tr>

                                    <td>3</td>

                                    <td>
                                        <strong>What We Offer</strong>
                                    </td>

                                    <td>
                                        Title,
                                        Short Content,
                                        Icon,
                                        Image
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style-offers.index') }}" class="btn btn-sm btn-success">

                                            Manage

                                        </a>

                                    </td>

                                </tr>

                                {{-- WHY CHOOSE US --}}
                                <tr>

                                    <td>4</td>

                                    <td>
                                        <strong>Why Choose Us</strong>
                                    </td>

                                    <td>
                                        Image/Icon,
                                        Title,
                                        Short Content
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style-why-choose.index') }}"
                                            class="btn btn-sm btn-success">

                                            Manage

                                        </a>

                                    </td>

                                </tr>

                                {{-- FEATURES / COUNTER --}}
                                <tr>

                                    <td>5</td>

                                    <td>
                                        <strong>Features / Counter</strong>
                                    </td>

                                    <td>
                                        Heading,
                                        Sub Heading,
                                        Counter Icon,
                                        Counter Value,
                                        Counter Text
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style.counter.edit') }}"
                                            class="btn btn-sm btn-primary">

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- CONTACT SECTION --}}
                                <tr>

                                    <td>6</td>

                                    <td>
                                        <strong>Contact Section</strong>
                                    </td>

                                    <td>
                                        Contact Heading,
                                        Contact Description,
                                        Phone,
                                        Email
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style.contact.edit') }}" class="btn btn-sm btn-primary">

                                            Edit

                                        </a>

                                    </td>

                                </tr>

                                {{-- OUR BRANDS --}}
                                <tr>

                                    <td>7</td>

                                    <td>
                                        <strong>Our Brands</strong>
                                    </td>

                                    <td>
                                        Brand Logo,
                                        Brand Name,
                                        Multiple Brands
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.hi-style-brands.index') }}" class="btn btn-sm btn-success">

                                            Manage

                                        </a>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')