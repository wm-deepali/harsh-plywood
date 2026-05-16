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

            <form action="{{ route('admin.about.introduction.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">
                        <strong>Edit Introduction</strong>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Heading
                                    </label>

                                    <input type="text"
                                           name="heading"
                                           class="form-control"
                                           value="{{ old('heading', $section->heading) }}">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Sub Heading
                                    </label>

                                    <input type="text"
                                           name="sub_heading"
                                           class="form-control"
                                           value="{{ old('sub_heading', $section->sub_heading) }}">

                                </div>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Experience Year
                                    </label>

                                    <input type="text"
                                           name="experience_year"
                                           class="form-control"
                                           placeholder="39+"
                                           value="{{ old('experience_year', $section->experience_year) }}">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>
                                        Experience Text
                                    </label>

                                    <input type="text"
                                           name="experience_text"
                                           class="form-control"
                                           placeholder="Years Experience"
                                           value="{{ old('experience_text', $section->experience_text) }}">

                                </div>

                            </div>

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                About Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">

                            <small class="text-muted">
                                Allowed: jpg, jpeg, png, webp | Max: 2MB
                            </small>

                            @if($section->image)

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $section->image) }}"
                                         width="180"
                                         class="img-thumbnail">

                                </div>

                            @endif

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Detail Content
                            </label>

                            <textarea name="content"
                                      id="editor"
                                      class="form-control">{{ old('content', $section->content) }}</textarea>

                        </div>

                        <button type="submit"
                                class="btn btn-primary mt-4">

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
</script>