{{-- resources/views/admin/hi_style/hero-edit.blade.php --}}

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
                        <a href="{{ route('admin.hi-style.index') }}">
                            Hi Style Page
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Hero Section
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Hero Section</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                        enctype="multipart/form-data"
                        action="{{ route('admin.hi-style.hero.update') }}">

                        @csrf

                        <div class="form-group">

                            <label>Hero Heading</label>

                            <input type="text"
                                name="hero_heading"
                                class="form-control"
                                value="{{ old('hero_heading', $hi_style->hero_heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Hero Sub Heading</label>

                            <input type="text"
                                name="hero_sub_heading"
                                class="form-control"
                                value="{{ old('hero_sub_heading', $hi_style->hero_sub_heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Hero Description</label>

                            <textarea name="hero_description"
                                rows="5"
                                class="form-control">{{ old('hero_description', $hi_style->hero_description ?? '') }}</textarea>

                        </div>

                        <div class="form-group mt-3">

                            <label>Button Text</label>

                            <input type="text"
                                name="hero_button_text"
                                class="form-control"
                                value="{{ old('hero_button_text', $hi_style->hero_button_text ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Button Link</label>

                            <input type="text"
                                name="hero_button_link"
                                class="form-control"
                                value="{{ old('hero_button_link', $hi_style->hero_button_link ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Hero Image</label>

                            <input type="file"
                                name="hero_image"
                                class="form-control">

                            @if(!empty($hi_style->hero_image))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/'.$hi_style->hero_image) }}"
                                        width="120">

                                </div>

                            @endif

                        </div>

                        <div class="mt-4">

                            <button type="submit"
                                class="btn btn-success">

                                Update Hero Section

                            </button>

                            <a href="{{ route('admin.hi-style.index') }}"
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