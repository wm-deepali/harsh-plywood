{{-- resources/views/admin/hrb/hero-edit.blade.php --}}

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

                        <a href="{{ route('admin.hrb.index') }}">

                            HRB Page

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Hero Section

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

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

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Edit Hero Section

                    </strong>

                </div>

                <div class="card-body">

                    <form id="heroForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.hrb.hero.update') }}">

                        @csrf

                        {{-- SUB TITLE --}}
                        <div class="form-group">

                            <label>

                                Sub Title

                            </label>

                            <input type="text"
                                   name="hero_sub_heading"
                                   class="form-control @error('hero_sub_heading') is-invalid @enderror"
                                   value="{{ old('hero_sub_heading', $hrb->hero_sub_heading ?? '') }}"
                                   placeholder="Enter sub title">

                            @error('hero_sub_heading')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- HEADING --}}
                        <div class="form-group mt-3">

                            <label>

                                Heading

                            </label>

                            <input type="text"
                                   name="hero_heading"
                                   class="form-control @error('hero_heading') is-invalid @enderror"
                                   value="{{ old('hero_heading', $hrb->hero_heading ?? '') }}"
                                   placeholder="Enter heading">

                            @error('hero_heading')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- CONTENT --}}
                        <div class="form-group mt-3">

                            <label>

                                Content

                            </label>

                            <textarea name="hero_description"
                                      rows="5"
                                      class="form-control @error('hero_description') is-invalid @enderror"
                                      placeholder="Enter content">{{ old('hero_description', $hrb->hero_description ?? '') }}</textarea>

                            @error('hero_description')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        <div class="row">

                            {{-- BUTTON 1 TEXT --}}
                            <div class="col-md-6 mt-3">

                                <label>

                                    Button 1 Text

                                </label>

                                <input type="text"
                                       name="hero_button_text"
                                       class="form-control @error('hero_button_text') is-invalid @enderror"
                                       value="{{ old('hero_button_text', $hrb->hero_button_text ?? '') }}"
                                       placeholder="Shop Now">

                                @error('hero_button_text')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- BUTTON 1 LINK --}}
                            <div class="col-md-6 mt-3">

                                <label>

                                    Button 1 Link

                                </label>

                                <input type="text"
                                       name="hero_button_link"
                                       class="form-control @error('hero_button_link') is-invalid @enderror"
                                       value="{{ old('hero_button_link', $hrb->hero_button_link ?? '') }}"
                                       placeholder="https://example.com">

                                @error('hero_button_link')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- BUTTON 2 TEXT --}}
                            <div class="col-md-6 mt-3">

                                <label>

                                    Button 2 Text

                                </label>

                                <input type="text"
                                       name="hero_button_2_text"
                                       class="form-control @error('hero_button_2_text') is-invalid @enderror"
                                       value="{{ old('hero_button_2_text', $hrb->hero_button_2_text ?? '') }}"
                                       placeholder="Contact Us">

                                @error('hero_button_2_text')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                            {{-- BUTTON 2 LINK --}}
                            <div class="col-md-6 mt-3">

                                <label>

                                    Button 2 Link

                                </label>

                                <input type="text"
                                       name="hero_button_2_link"
                                       class="form-control @error('hero_button_2_link') is-invalid @enderror"
                                       value="{{ old('hero_button_2_link', $hrb->hero_button_2_link ?? '') }}"
                                       placeholder="https://example.com">

                                @error('hero_button_2_link')

                                    <span class="invalid-feedback d-block">

                                        {{ $message }}

                                    </span>

                                @enderror

                            </div>

                        </div>

                        {{-- HERO IMAGE --}}
                        <div class="form-group mt-4">

                            <label>

                                Hero Image

                            </label>

                            <input type="file"
                                   name="hero_image"
                                   class="form-control @error('hero_image') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max 2MB

                            </small>

                            @error('hero_image')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                            @if(!empty($hrb->hero_image))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/'.$hrb->hero_image) }}"
                                         width="150"
                                         class="img-thumbnail">

                                </div>

                            @endif

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-4">

                            <button type="submit"
                                    id="saveBtn"
                                    class="btn btn-success">

                                <i class="fa fa-save"></i>

                                Update Hero Section

                            </button>

                            <a href="{{ route('admin.hrb.index') }}"
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
    document.getElementById('heroForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });

</script>