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

                        History

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form id="historyForm"
                  action="{{ route('admin.about.history.update') }}"
                  method="POST">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">

                        <strong>

                            Edit History

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

                            {{-- YEAR --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>

                                        Year

                                    </label>

                                    <input type="text"
                                           name="year"
                                           class="form-control @error('year') is-invalid @enderror"
                                           placeholder="1985"
                                           value="{{ old('year', $section->year ?? '') }}">

                                    @error('year')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- ICON --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>

                                        Icon Class

                                    </label>

                                    <input type="text"
                                           name="icon"
                                           class="form-control @error('icon') is-invalid @enderror"
                                           placeholder="fa-solid fa-rocket"
                                           value="{{ old('icon', $section->icon ?? '') }}">

                                    <small class="text-muted d-block mt-1">

                                        Example: fa-solid fa-rocket

                                    </small>

                                    @error('icon')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                        </div>

                        {{-- HEADING --}}
                        <div class="form-group mt-3">

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

                            Update History

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
    document.getElementById('historyForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });

</script>