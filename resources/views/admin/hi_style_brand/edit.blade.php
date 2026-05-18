@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        {{-- Breadcrumb --}}
        <div class="breadcrumbs-top d-flex align-items-center justify-content-between bg-light px-3 py-2 mb-3 rounded">


            <ol class="breadcrumb mb-0 bg-transparent p-0">

                <li class="breadcrumb-item">

                    <a href="{{ route('admin.dashboard') }}">

                        Dashboard

                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a href="{{ route('admin.hi-style-brands.index') }}">

                        Brands

                    </a>

                </li>

                <li class="breadcrumb-item active">

                    Edit Brand

                </li>

            </ol>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Edit Hi Style Brand</strong>
            </div>

            <div class="card-body">

                {{-- Success Message --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button type="button"
                            class="close"
                            data-dismiss="alert">

                            <span>&times;</span>

                        </button>

                    </div>

                @endif

                {{-- Error Message --}}
                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        {{ session('error') }}

                        <button type="button"
                            class="close"
                            data-dismiss="alert">

                            <span>&times;</span>

                        </button>

                    </div>

                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())

                    <div class="alert alert-danger">

                        <strong>Please fix the following errors:</strong>

                        <ul class="mb-0 mt-2">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form method="POST"
                    enctype="multipart/form-data"
                    action="{{ route('admin.hi-style-brands.update', $brand->id) }}">

                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label>
                            Brand Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="brand_name"
                            class="form-control @error('brand_name') is-invalid @enderror"
                            value="{{ old('brand_name', $brand->brand_name) }}"
                            placeholder="Enter brand name">

                        @error('brand_name')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Brand Logo</label>

                        <input type="file"
                            name="brand_logo"
                            class="form-control @error('brand_logo') is-invalid @enderror">

                        <small class="text-muted">

                            Allowed: jpg, jpeg, png, webp | Max: 2MB

                        </small>

                        @error('brand_logo')

                            <br>

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                        @enderror

                        @if($brand->brand_logo)

                            <div class="mt-3">

                                <img src="{{ asset('storage/'.$brand->brand_logo) }}"
                                    alt="Brand Logo"
                                    width="120"
                                    class="img-thumbnail">

                            </div>

                        @endif

                    </div>

                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                name="status"
                                id="status"
                                class="custom-control-input"
                                {{ old('status', $brand->status) ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                for="status">

                                Active

                            </label>

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit"
                            class="btn btn-success">

                            Update Brand

                        </button>

                        <a href="{{ route('admin.hi-style-brands.index') }}"
                            class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')