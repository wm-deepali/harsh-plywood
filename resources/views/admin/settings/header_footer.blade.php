{{-- resources/views/admin/settings/header_footer.blade.php --}}

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

                    <li class="breadcrumb-item active">

                        Header & Footer Settings

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Header & Footer Settings

                    </strong>

                </div>

                <div class="card-body">

                    {{-- SUCCESS --}}
                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show">

                            {{ session('success') }}

                            <button type="button"
                                    class="close"
                                    data-dismiss="alert">

                                &times;

                            </button>

                        </div>

                    @endif

                    {{-- ERROR --}}
                    @if(session('error'))

                        <div class="alert alert-danger alert-dismissible fade show">

                            {{ session('error') }}

                            <button type="button"
                                    class="close"
                                    data-dismiss="alert">

                                &times;

                            </button>

                        </div>

                    @endif

                    {{-- VALIDATION ERRORS --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form id="hfForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.settings.header') }}">

                        @csrf

                        <div class="row">

                            {{-- HEADER LOGO --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Header Logo

                                </label>

                                <div class="upload-box text-center p-4 border rounded bg-light">

                                    <input type="file"
                                           name="header_logo"
                                           id="header_logo"
                                           accept="image/*"
                                           class="d-none">

                                    <div onclick="document.getElementById('header_logo').click()"
                                         style="cursor:pointer;">

                                        <i class="fa fa-image fa-3x text-primary"></i>

                                        <h5 class="mt-2 mb-1">

                                            Upload Header Logo

                                        </h5>

                                        <p class="text-muted mb-0">

                                            Click here to upload logo

                                        </p>

                                        <small class="text-muted d-block mt-1">

                                            JPG, JPEG, PNG, WEBP | Max 2MB

                                        </small>

                                    </div>

                                </div>

                                @error('header_logo')

                                    <span class="text-danger d-block mt-2">

                                        {{ $message }}

                                    </span>

                                @enderror

                                <div id="headerPreview" class="mt-3">

                                    @if(!empty($data->header_logo))

                                        <img src="{{ asset('storage/' . $data->header_logo) }}"
                                             width="120"
                                             class="border rounded p-1 bg-white">

                                    @endif

                                </div>

                            </div>

                            {{-- FOOTER LOGO --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Footer Logo

                                </label>

                                <div class="upload-box text-center p-4 border rounded bg-light">

                                    <input type="file"
                                           name="footer_logo"
                                           id="footer_logo"
                                           accept="image/*"
                                           class="d-none">

                                    <div onclick="document.getElementById('footer_logo').click()"
                                         style="cursor:pointer;">

                                        <i class="fa fa-image fa-3x text-primary"></i>

                                        <h5 class="mt-2 mb-1">

                                            Upload Footer Logo

                                        </h5>

                                        <p class="text-muted mb-0">

                                            Click here to upload logo

                                        </p>

                                        <small class="text-muted d-block mt-1">

                                            JPG, JPEG, PNG, WEBP | Max 2MB

                                        </small>

                                    </div>

                                </div>

                                @error('footer_logo')

                                    <span class="text-danger d-block mt-2">

                                        {{ $message }}

                                    </span>

                                @enderror

                                <div id="footerPreview" class="mt-3">

                                    @if(!empty($data->footer_logo))

                                        <img src="{{ asset('storage/' . $data->footer_logo) }}"
                                             width="120"
                                             class="border rounded p-1 bg-white">

                                    @endif

                                </div>

                            </div>

                            {{-- EMAIL --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Email

                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $data->email ?? '') }}"
                                       placeholder="info@example.com">

                                @error('email')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- WHATSAPP --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    WhatsApp Number

                                </label>

                                <input type="text"
                                       name="whatsapp"
                                       class="form-control @error('whatsapp') is-invalid @enderror"
                                       value="{{ old('whatsapp', $data->whatsapp ?? '') }}"
                                       placeholder="+91 9876543210">

                                @error('whatsapp')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- MOBILE --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Mobile Number

                                </label>

                                <input type="text"
                                       name="mobile"
                                       class="form-control @error('mobile') is-invalid @enderror"
                                       value="{{ old('mobile', $data->mobile ?? '') }}"
                                       placeholder="+91 9876543210">

                                @error('mobile')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- COPYRIGHT --}}
                            <div class="col-md-6 mb-4">

                                <label>

                                    Copyright Text

                                </label>

                                <input type="text"
                                       name="copyright"
                                       class="form-control @error('copyright') is-invalid @enderror"
                                       value="{{ old('copyright', $data->copyright ?? '') }}"
                                       placeholder="© 2026 Company Name. All Rights Reserved.">

                                @error('copyright')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- ADDRESS --}}
                            <div class="col-md-12 mb-4">

                                <label>

                                    Address

                                </label>

                                <textarea name="address"
                                          rows="3"
                                          class="form-control @error('address') is-invalid @enderror"
                                          placeholder="Enter address here">{{ old('address', $data->address ?? '') }}</textarea>

                                @error('address')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- SHORT CONTENT --}}
                            <div class="col-md-12 mb-4">

                                <label>

                                    Short Content

                                </label>

                                <textarea name="short_content"
                                          rows="4"
                                          class="form-control @error('short_content') is-invalid @enderror"
                                          placeholder="Short footer/about content">{{ old('short_content', $data->short_content ?? '') }}</textarea>

                                @error('short_content')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-3">

                            <button type="submit"
                                    id="saveBtn"
                                    class="btn btn-success">

                                <i class="fa fa-save"></i>

                                Save Settings

                            </button>

                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-secondary">

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

    // HEADER PREVIEW
    document.getElementById('header_logo').addEventListener('change', function ()
    {
        previewImage(this, 'headerPreview');
    });

    // FOOTER PREVIEW
    document.getElementById('footer_logo').addEventListener('change', function ()
    {
        previewImage(this, 'footerPreview');
    });

    // IMAGE PREVIEW FUNCTION
    function previewImage(input, target)
    {
        let file = input.files[0];

        if (!file) return;

        let reader = new FileReader();

        reader.onload = function (e)
        {
            document.getElementById(target).innerHTML = `
                <img src="${e.target.result}"
                     width="120"
                     class="border rounded p-1 bg-white">
            `;
        };

        reader.readAsDataURL(file);
    }

    // PREVENT DOUBLE SUBMIT
    document.getElementById('hfForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });

</script>