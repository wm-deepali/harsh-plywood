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

                    <li class="breadcrumb-item active">
                        Home Video Section
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="row">

                <div class="col-md-12">

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

                    <div class="card">

                        <div class="card-header">

                            <h4 class="mb-0">
                                Home Video Section
                            </h4>

                        </div>

                        <div class="card-body">

                            <form method="POST"
                                  action="{{ route('admin.home-video-section.update') }}"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    {{-- SUBTITLE --}}
                                    <div class="col-md-12 mb-3">

                                        <label>
                                            Subtitle
                                        </label>

                                        <input type="text"
                                               name="subtitle"
                                               class="form-control @error('subtitle') is-invalid @enderror"
                                               value="{{ old('subtitle', $videoSection->subtitle ?? '') }}"
                                               placeholder="Enter subtitle">

                                        @error('subtitle')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    {{-- TITLE --}}
                                    <div class="col-md-12 mb-3">

                                        <label>
                                            Title
                                        </label>

                                        <textarea name="title"
                                                  rows="5"
                                                  class="form-control @error('title') is-invalid @enderror"
                                                  placeholder="Enter title">{{ old('title', $videoSection->title ?? '') }}</textarea>

                                        @error('title')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    {{-- IMAGE --}}
                                    <div class="col-md-12 mb-3">

                                        <label>
                                            Background Image
                                        </label>

                                        <input type="file"
                                               name="background_image"
                                               class="form-control @error('background_image') is-invalid @enderror">

                                        <small class="text-muted d-block mt-1">
                                            Allowed: JPG, JPEG, PNG, WEBP |
                                            Recommended: 1920×1080px |
                                            Max: 2MB
                                        </small>

                                        @error('background_image')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    {{-- IMAGE PREVIEW --}}
                                    @if(!empty($videoSection->background_image))

                                        <div class="col-md-12 mb-4">

                                            <img src="{{ asset('storage/'.$videoSection->background_image) }}"
                                                 alt="Preview"
                                                 style="width:280px;
                                                        border-radius:10px;
                                                        border:1px solid #ddd;
                                                        padding:5px;">

                                        </div>

                                    @endif

                                    {{-- VIDEO URL --}}
                                    <div class="col-md-12 mb-4">

                                        <label>
                                            Video URL
                                        </label>

                                        <input type="text"
                                               name="video_url"
                                               class="form-control @error('video_url') is-invalid @enderror"
                                               value="{{ old('video_url', $videoSection->video_url ?? '') }}"
                                               placeholder="https://www.youtube.com/embed/video-id">

                                        @error('video_url')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    {{-- BUTTON --}}
                                    <div class="col-md-12">

                                        <button type="submit"
                                                class="btn btn-primary">

                                            <i class="fa fa-save"></i>
                                            Update Section

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')