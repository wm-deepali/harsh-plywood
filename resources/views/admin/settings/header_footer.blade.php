@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

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
                    <strong>Header & Footer Settings</strong>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    {{-- Validation Errors --}}
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

                        {{-- Header Logo --}}
                        <div class="form-group">

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

                        {{-- Footer Logo --}}
                        <div class="form-group mt-4">

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

                        {{-- WhatsApp --}}
                        <div class="form-group mt-4">

                            <label>
                                WhatsApp Number
                            </label>

                            <input type="text"
                                   name="whatsapp"
                                   class="form-control @error('whatsapp') is-invalid @enderror"
                                   value="{{ old('whatsapp', $data->whatsapp ?? '') }}"
                                   placeholder="+91 9876543210">

                            @error('whatsapp')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Mobile --}}
                        <div class="form-group mt-3">

                            <label>
                                Mobile Number
                            </label>

                            <input type="text"
                                   name="mobile"
                                   class="form-control @error('mobile') is-invalid @enderror"
                                   value="{{ old('mobile', $data->mobile ?? '') }}"
                                   placeholder="+91 9876543210">

                            @error('mobile')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Address --}}
                        <div class="form-group mt-3">

                            <label>
                                Address
                            </label>

                            <textarea name="address"
                                      rows="3"
                                      class="form-control @error('address') is-invalid @enderror"
                                      placeholder="Enter address here">{{ old('address', $data->address ?? '') }}</textarea>

                            @error('address')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Short Content --}}
                        <div class="form-group mt-3">

                            <label>
                                Short Content
                            </label>

                            <textarea name="short_content"
                                      rows="4"
                                      class="form-control @error('short_content') is-invalid @enderror"
                                      placeholder="Short footer/about content">{{ old('short_content', $data->short_content ?? '') }}</textarea>

                            @error('short_content')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Copyright --}}
                        <div class="form-group mt-3">

                            <label>
                                Copyright Text
                            </label>

                            <input type="text"
                                   name="copyright"
                                   class="form-control @error('copyright') is-invalid @enderror"
                                   value="{{ old('copyright', $data->copyright ?? '') }}"
                                   placeholder="© 2026 Company Name. All Rights Reserved.">

                            @error('copyright')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Buttons --}}
                        <div class="mt-4">

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

    // Header Preview
    document.getElementById('header_logo').addEventListener('change', function () {

        previewImage(this, 'headerPreview');

    });

    // Footer Preview
    document.getElementById('footer_logo').addEventListener('change', function () {

        previewImage(this, 'footerPreview');

    });

    // Preview Function
    function previewImage(input, target) {

        let file = input.files[0];

        if (!file) return;

        let reader = new FileReader();

        reader.onload = function (e) {

            document.getElementById(target).innerHTML = `
                <img src="${e.target.result}"
                     width="120"
                     class="border rounded p-1 bg-white">
            `;

        };

        reader.readAsDataURL(file);

    }

    // Prevent Double Submit
    document.getElementById('hfForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>