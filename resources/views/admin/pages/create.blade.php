{{-- resources/views/admin/pages/create.blade.php --}}

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
                        <a href="{{ route('admin.pages.index') }}">
                            Manage Pages
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Page
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Page</strong>
                </div>

                <div class="card-body">

                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form id="pageForm"
                          method="POST"
                          action="{{ route('admin.pages.store') }}">

                        @csrf

                        {{-- Title --}}
                        <div class="form-group">

                            <label>Title *</label>

                            <input type="text"
                                   name="title"
                                   id="title"
                                   required
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}">

                            @error('title')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Slug --}}
                        <div class="form-group mt-3">

                            <label>Slug</label>

                            <input type="text"
                                   name="slug"
                                   id="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug') }}">

                            @error('slug')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Content --}}
                        <div class="form-group mt-3">

                            <label>Content</label>

                            <textarea name="content"
                                      id="content"
                                      rows="6"
                                      class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>

                            @error('content')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        <hr class="mt-4">

                        <h5>SEO Settings</h5>

                        {{-- Meta Title --}}
                        <div class="form-group mt-3">

                            <label>Meta Title</label>

                            <input type="text"
                                   name="meta_title"
                                   id="meta_title"
                                   class="form-control @error('meta_title') is-invalid @enderror"
                                   value="{{ old('meta_title') }}">

                            @error('meta_title')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Meta Description --}}
                        <div class="form-group mt-3">

                            <label>Meta Description</label>

                            <textarea name="meta_description"
                                      class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>

                            @error('meta_description')

                                <span class="text-danger">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox"
                                       name="status"
                                       id="status"
                                       value="1"
                                       class="custom-control-input"
                                       {{ old('status', 1) ? 'checked' : '' }}>

                                <label class="custom-control-label" for="status">
                                    Active
                                </label>

                            </div>

                        </div>

                        {{-- Buttons --}}
                        <div class="mt-4">

                            <button type="submit"
                                    id="saveBtn"
                                    class="btn btn-success">

                                Save Page

                            </button>

                            <a href="{{ route('admin.pages.index') }}"
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

<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<script>

    CKEDITOR.replace('content');

    document.getElementById('title').addEventListener('keyup', function () {

        let slug = this.value
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        document.getElementById('slug').value = slug;

        if (!document.getElementById('meta_title').value) {

            document.getElementById('meta_title').value = this.value;

        }

    });

    document.getElementById('pageForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = 'Saving...';

    });

</script>