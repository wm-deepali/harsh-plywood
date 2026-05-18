{{-- resources/views/admin/hi_style/contact-edit.blade.php --}}

@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        {{-- BREADCRUMB --}}
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.dashboard') }}">

                            Dashboard

                        </a>

                    </li>

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.hi-style.index') }}">

                            Hi Style Page

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Contact Section

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Edit Contact Section

                    </strong>

                </div>

                <div class="card-body">

                    {{-- SUCCESS --}}
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show">

                            {{ session('success') }}

                            <button type="button" class="close" data-dismiss="alert">

                                &times;

                            </button>

                        </div>

                    @endif

                    {{-- ERROR --}}
                    @if(session('error'))

                        <div class="alert alert-danger alert-dismissible fade show">

                            {{ session('error') }}

                            <button type="button" class="close" data-dismiss="alert">

                                &times;

                            </button>

                        </div>

                    @endif

                    {{-- VALIDATION --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form id="contactForm" method="POST" action="{{ route('admin.hi-style.contact.update') }}">

                        @csrf

                        {{-- CONTACT HEADING --}}
                        <div class="form-group">

                            <label>

                                Contact Heading

                            </label>

                            <input type="text" name="contact_heading"
                                class="form-control @error('contact_heading') is-invalid @enderror"
                                value="{{ old('contact_heading', $hi_style->contact_heading ?? '') }}"
                                placeholder="Enter contact heading">

                            @error('contact_heading')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- CONTACT DESCRIPTION --}}
                        <div class="form-group mt-3">

                            <label>

                                Contact Description

                            </label>

                            <textarea name="contact_description" rows="5"
                                class="form-control @error('contact_description') is-invalid @enderror"
                                placeholder="Enter contact description">{{ old('contact_description', $hi_style->contact_description ?? '') }}</textarea>

                            @error('contact_description')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- PHONE --}}
                        <div class="form-group mt-3">

                            <label>

                                Phone Number

                            </label>

                            <input type="text" name="contact_phone"
                                class="form-control @error('contact_phone') is-invalid @enderror"
                                value="{{ old('contact_phone', $hi_style->contact_phone ?? '') }}"
                                placeholder="+91 9876543210">

                            @error('contact_phone')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group mt-3">

                            <label>

                                Email Address

                            </label>

                            <input type="email" name="contact_email"
                                class="form-control @error('contact_email') is-invalid @enderror"
                                value="{{ old('contact_email', $hi_style->contact_email ?? '') }}"
                                placeholder="example@gmail.com">

                            @error('contact_email')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-4">

                            <button type="submit" id="saveBtn" class="btn btn-success">

                                <i class="fa fa-save"></i>

                                Update Contact Section

                            </button>

                            <a href="{{ route('admin.hi-style.index') }}" class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    /*
    |--------------------------------------------------------------------------
    | PREVENT DOUBLE SUBMIT
    |--------------------------------------------------------------------------
    */

    document.getElementById('contactForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';

    });

</script>