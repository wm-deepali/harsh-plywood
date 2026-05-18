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
                        Why Choose Us
                    </li>

                </ol>

            </div>

        </div>

        {{-- Alerts --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        @if ($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

            </div>

        @endif

        <div class="content-wrapper pb-4">

            <!-- SECTION FORM -->

            <form action="{{ route('admin.why-choose.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">

                        <strong>
                            Manage Why Choose Section
                        </strong>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Sub Heading
                                </label>

                                <input type="text"
                                       name="sub_heading"
                                       class="form-control @error('sub_heading') is-invalid @enderror"
                                       value="{{ old('sub_heading', $section->sub_heading ?? '') }}">

                                @error('sub_heading')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Heading
                                </label>

                                <input type="text"
                                       name="heading"
                                       class="form-control @error('heading') is-invalid @enderror"
                                       value="{{ old('heading', $section->heading ?? '') }}">

                                @error('heading')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="5"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $section->description ?? '') }}</textarea>

                            @error('description')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Main Image
                                </label>

                                <input type="file"
                                       name="main_image"
                                       class="form-control @error('main_image') is-invalid @enderror">

                                @error('main_image')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                                <small class="text-muted">
                                    Allowed: jpg, jpeg, png, webp | Max: 2MB
                                </small>

                                @if(isset($section) && $section->main_image)

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $section->main_image) }}"
                                             class="img-thumbnail"
                                             width="180">

                                    </div>

                                @endif

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Small Image
                                </label>

                                <input type="file"
                                       name="small_image"
                                       class="form-control @error('small_image') is-invalid @enderror">

                                @error('small_image')

                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>

                                @enderror

                                <small class="text-muted">
                                    Allowed: jpg, jpeg, png, webp | Max: 2MB
                                </small>

                                @if(isset($section) && $section->small_image)

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $section->small_image) }}"
                                             class="img-thumbnail"
                                             width="180">

                                    </div>

                                @endif

                            </div>

                        </div>

                        <button type="submit"
                                class="btn btn-primary mt-3">

                            Update Section

                        </button>

                    </div>

                </div>

            </form>

            <!-- FEATURES -->

            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-white d-flex justify-content-between align-items-center">

                    <strong>
                        Manage Features
                    </strong>

                    <button type="button"
                            class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#addFeatureModal">

                        Add Feature

                    </button>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th width="80">
                                        ID
                                    </th>

                                    <th>
                                        Position
                                    </th>

                                    <th>
                                        Icon
                                    </th>

                                    <th>
                                        Title
                                    </th>

                                    <th>
                                        Description
                                    </th>

                                    <th width="180">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($features as $feature)

                                    <tr id="featureRow{{ $feature->id }}">

                                        <td>
                                            {{ $feature->id }}
                                        </td>

                                        <td>
                                            {{ ucfirst($feature->position) }}
                                        </td>

                                        <td>

                                            <i class="{{ $feature->icon }}"></i>

                                            <span class="ms-2">
                                                {{ $feature->icon }}
                                            </span>

                                        </td>

                                        <td>
                                            {{ $feature->title }}
                                        </td>

                                        <td>
                                            {{ $feature->description }}
                                        </td>

                                        <td>

                                            <div class="d-flex gap-2">

                                                <button type="button"
                                                        class="btn btn-info btn-sm text-white"
                                                        data-toggle="modal"
                                                        data-target="#editFeatureModal{{ $feature->id }}">

                                                    Edit

                                                </button>

                                                <button type="button"
                                                        class="btn btn-danger btn-sm"
                                                        style="margin-left:10px;"
                                                        onclick="deleteFeature({{ $feature->id }})">

                                                    Delete

                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center">

                                            No Features Added

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')