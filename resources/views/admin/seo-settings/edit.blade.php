@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.settings.seo-settings.index') }}">
                            SEO Settings
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit SEO Setting
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <form action="{{ route('admin.settings.seo-settings.update', $seoSetting->id) }}" method="POST">

                @csrf

                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-4">
                            {{ $seoSetting->page_name }}
                        </h4>

                        <div class="form-group mb-3">
                            <label>Meta Title</label>

                            <input type="text" name="meta_title" class="form-control"
                                value="{{ old('meta_title', $seoSetting->meta_title) }}">

                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Meta Keywords</label>

                            <textarea name="meta_keywords" rows="4"
                                class="form-control">{{ old('meta_keywords', $seoSetting->meta_keywords) }}</textarea>

                            @error('meta_keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Meta Description</label>

                            <textarea name="meta_description" rows="5"
                                class="form-control">{{ old('meta_description', $seoSetting->meta_description) }}</textarea>

                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @if($seoSetting->page_name == 'Home')

                            <div class="form-group mb-3">
                                <label>Schema Script</label>

                                <textarea name="schema_script" rows="10"
                                    class="form-control">{{ old('schema_script', $seoSetting->schema_script) }}</textarea>

                                @error('schema_script')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        @endif

                        <button type="submit" class="btn btn-primary">
                            Update SEO Settings
                        </button>

                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@include('admin.footer')