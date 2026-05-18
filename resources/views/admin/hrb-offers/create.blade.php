{{-- resources/views/admin/hrb-offers/create.blade.php --}}

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

                        <a href="{{ route('admin.hrb-offers.index') }}">

                            HRB Offers

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Add Offer

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Add Offer

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

                    <form id="offerForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.hrb-offers.store') }}">

                        @csrf

                        {{-- TITLE --}}
                        <div class="form-group">

                            <label>

                                Title

                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   placeholder="Enter title">

                            @error('title')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- SHORT CONTENT --}}
                        <div class="form-group mt-3">

                            <label>

                                Short Content

                            </label>

                            <textarea name="short_content"
                                      rows="5"
                                      class="form-control @error('short_content') is-invalid @enderror"
                                      placeholder="Enter short content">{{ old('short_content') }}</textarea>

                            @error('short_content')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- ICON --}}
                        <div class="form-group mt-3">

                            <label>

                                Icon Class

                            </label>

                            <input type="text"
                                   name="icon"
                                   class="form-control @error('icon') is-invalid @enderror"
                                   placeholder="fa fa-home"
                                   value="{{ old('icon') }}">

                            @error('icon')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- IMAGE --}}
                        <div class="form-group mt-3">

                            <label>

                                Image

                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                            </small>

                            @error('image')

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

                                Save Offer

                            </button>

                            <a href="{{ route('admin.hrb-offers.index') }}"
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

    // PREVENT DOUBLE SUBMIT
    document.getElementById('offerForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });

</script>