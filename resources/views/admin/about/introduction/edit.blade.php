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

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.about.index') }}">
                            About Us
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Introduction
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form id="introForm"
                  action="{{ route('admin.about.introduction.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">

                        <strong>
                            Edit Introduction
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

                        <div class="row">

                            {{-- HEADING --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Heading
                                    </label>

                                    <input type="text"
                                           name="heading"
                                           class="form-control @error('heading') is-invalid @enderror"
                                           value="{{ old('heading', $section->heading ?? '') }}"
                                           placeholder="Enter heading">

                                    @error('heading')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- SUB HEADING --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Sub Heading
                                    </label>

                                    <input type="text"
                                           name="sub_heading"
                                           class="form-control @error('sub_heading') is-invalid @enderror"
                                           value="{{ old('sub_heading', $section->sub_heading ?? '') }}"
                                           placeholder="Enter sub heading">

                                    @error('sub_heading')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row mt-3">

                            {{-- EXPERIENCE YEAR --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Experience Year
                                    </label>

                                    <input type="text"
                                           name="experience_year"
                                           class="form-control @error('experience_year') is-invalid @enderror"
                                           placeholder="39+"
                                           value="{{ old('experience_year', $section->experience_year ?? '') }}">

                                    @error('experience_year')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- EXPERIENCE TEXT --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Experience Text
                                    </label>

                                    <input type="text"
                                           name="experience_text"
                                           class="form-control @error('experience_text') is-invalid @enderror"
                                           placeholder="Years Experience"
                                           value="{{ old('experience_text', $section->experience_text ?? '') }}">

                                    @error('experience_text')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                        </div>

                        {{-- IMAGE --}}
                        <div class="form-group mt-3">

                            <label>
                                About Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max: 2MB

                            </small>

                            @error('image')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                            @if(!empty($section->image))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $section->image) }}"
                                         width="180"
                                         class="img-thumbnail">

                                </div>

                            @endif

                        </div>

                        {{-- CONTENT --}}
                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content"
                                      id="editor"
                                      class="form-control @error('content') is-invalid @enderror">{{ old('content', $section->content ?? '') }}</textarea>

                            @error('content')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                id="saveBtn"
                                class="btn btn-primary mt-4">

                            <i class="fa fa-save"></i>

                            Update Introduction

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<script>

    CKEDITOR.replace('editor');

    // PREVENT DOUBLE SUBMIT
    document.getElementById('introForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });

</script>