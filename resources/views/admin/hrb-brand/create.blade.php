{{-- resources/views/admin/hrb-brand/create.blade.php --}}

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

                        <a href="{{ route('admin.hrb-brands.index') }}">

                            HRB Brands

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Add Brand

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Add HRB Brand

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

                    <form id="brandForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.hrb-brands.store') }}">

                        @csrf

                        {{-- BRAND NAME --}}
                        <div class="form-group">

                            <label>

                                Brand Name

                            </label>

                            <input type="text"
                                   name="brand_name"
                                   class="form-control @error('brand_name') is-invalid @enderror"
                                   value="{{ old('brand_name') }}"
                                   placeholder="Enter brand name">

                            @error('brand_name')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- BRAND LOGO --}}
                        <div class="form-group mt-3">

                            <label>

                                Brand Logo

                            </label>

                            <input type="file"
                                   name="brand_logo"
                                   class="form-control @error('brand_logo') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                            </small>

                            @error('brand_logo')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- STATUS --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                       name="status"
                                       id="status"
                                       class="custom-control-input"
                                       {{ old('status', 1) ? 'checked' : '' }}>

                                <label class="custom-control-label"
                                       for="status">

                                    Active

                                </label>

                            </div>

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-4">

                            <button type="submit"
                                    id="saveBtn"
                                    class="btn btn-success">

                                <i class="fa fa-save"></i>

                                Save Brand

                            </button>

                            <a href="{{ route('admin.hrb-brands.index') }}"
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

    document.getElementById('brandForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });

</script>