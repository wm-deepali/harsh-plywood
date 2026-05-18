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

                        Vision

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form id="visionForm"
                  action="{{ route('admin.about.vision.update') }}"
                  method="POST">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">

                        <strong>

                            Edit Vision

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

                        {{-- HEADING --}}
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

                        {{-- ICON --}}
                        <div class="form-group mt-3">

                            <label>

                                Icon Class

                            </label>

                            <input type="text"
                                   name="icon"
                                   class="form-control @error('icon') is-invalid @enderror"
                                   placeholder="fa-solid fa-eye"
                                   value="{{ old('icon', $section->icon ?? '') }}">

                            <small class="text-muted d-block mt-1">

                                Example: fa-solid fa-eye

                            </small>

                            @error('icon')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

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

                        {{-- POINTS --}}
                        <div class="row mt-3">

                            {{-- POINT 1 --}}
                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Point 1

                                    </label>

                                    <input type="text"
                                           name="point_1"
                                           class="form-control @error('point_1') is-invalid @enderror"
                                           value="{{ old('point_1', $section->point_1 ?? '') }}"
                                           placeholder="Enter point 1">

                                    @error('point_1')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- POINT 2 --}}
                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Point 2

                                    </label>

                                    <input type="text"
                                           name="point_2"
                                           class="form-control @error('point_2') is-invalid @enderror"
                                           value="{{ old('point_2', $section->point_2 ?? '') }}"
                                           placeholder="Enter point 2">

                                    @error('point_2')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- POINT 3 --}}
                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>

                                        Point 3

                                    </label>

                                    <input type="text"
                                           name="point_3"
                                           class="form-control @error('point_3') is-invalid @enderror"
                                           value="{{ old('point_3', $section->point_3 ?? '') }}"
                                           placeholder="Enter point 3">

                                    @error('point_3')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                id="saveBtn"
                                class="btn btn-primary mt-4">

                            <i class="fa fa-save"></i>

                            Update Vision

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
    document.getElementById('visionForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });

</script>