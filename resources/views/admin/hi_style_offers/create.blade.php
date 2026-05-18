@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        {{-- Breadcrumb --}}
        <div class="breadcrumbs-top d-flex align-items-center justify-content-between bg-light px-3 py-2 mb-3 rounded">

            <ol class="breadcrumb mb-0 bg-transparent p-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.hi-style-offers.index') }}">Offers</a>
                </li>

                <li class="breadcrumb-item active">
                    Add Offer
                </li>
            </ol>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add Offer</strong>
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
                    action="{{ route('admin.hi-style-offers.store') }}">

                    @csrf

                    <div class="form-group">

                        <label>
                            Title <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            placeholder="Enter title">

                        @error('title')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Short Content</label>

                        <textarea name="short_content"
                            rows="5"
                            class="form-control @error('short_content') is-invalid @enderror"
                            placeholder="Enter short content">{{ old('short_content') }}</textarea>

                        @error('short_content')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Icon Class</label>

                        <input type="text"
                            name="icon"
                            class="form-control @error('icon') is-invalid @enderror"
                            value="{{ old('icon') }}"
                            placeholder="fa fa-home">

                        @error('icon')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <label>Image</label>

                        <input type="file"
                            name="image"
                            class="form-control @error('image') is-invalid @enderror">

                        <small class="text-muted">
                            Allowed: jpg, jpeg, png, webp | Max: 2MB
                        </small>

                        @error('image')

                            <br>

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                name="status"
                                id="status"
                                class="custom-control-input"
                                {{ old('status', true) ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                for="status">

                                Active

                            </label>

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit"
                            class="btn btn-success">

                            Save Offer

                        </button>

                        <a href="{{ route('admin.hi-style-offers.index') }}"
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