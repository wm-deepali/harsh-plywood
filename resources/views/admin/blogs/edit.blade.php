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
                        <a href="{{ route('admin.blogs.index') }}">Manage Blogs</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit Blog
                    </li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Blog</strong>
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

                    <form id="blogForm" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.blogs.update', $blog->id) }}">

                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title *</label>

                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $blog->title) }}"
                                   required>

                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="form-group mt-3">
                            <label>Slug</label>

                            <input type="text"
                                   name="slug"
                                   id="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug', $blog->slug) }}">

                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="form-group mt-3">
                            <label>Image</label>

                            <input type="file"
                                   name="image"
                                   class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}"
                                    width="120" class="mt-2">
                            @endif
                        </div>

                        <!-- Short Description -->
                        <div class="form-group mt-3">
                            <label>Short Description</label>

                            <textarea name="short_description"
                                      class="form-control @error('short_description') is-invalid @enderror"
                                      rows="3">{{ old('short_description', $blog->short_description) }}</textarea>

                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="form-group mt-3">
                            <label>Content *</label>

                            <textarea name="content"
                                      id="content"
                                      class="form-control @error('content') is-invalid @enderror"
                                      rows="6"
                                      required>{{ old('content', $blog->content) }}</textarea>

                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 🔥 SEO Section -->
                        <hr class="mt-4">

                        <h5 class="mb-3">SEO Settings</h5>

                        <div class="form-group">
                            <label>Meta Title</label>

                            <input type="text"
                                   name="meta_title"
                                   id="meta_title"
                                   class="form-control @error('meta_title') is-invalid @enderror"
                                   value="{{ old('meta_title', $blog->meta_title) }}">

                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label>Meta Description</label>

                            <textarea name="meta_description"
                                      id="meta_description"
                                      class="form-control @error('meta_description') is-invalid @enderror"
                                      rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>

                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Checkbox -->
                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="show_home"
                                       id="show_home"
                                       class="custom-control-input"
                                       {{ $blog->show_home ? 'checked' : '' }}>

                                <label class="custom-control-label" for="show_home">
                                    Show on Home Page
                                </label>
                            </div>

                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox"
                                       name="status"
                                       id="status"
                                       class="custom-control-input"
                                       {{ $blog->status ? 'checked' : '' }}>

                                <label class="custom-control-label" for="status">
                                    Active
                                </label>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-4">

                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i>
                                Update Blog
                            </button>

                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
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
    // ✅ Auto slug
    document.getElementById('title').addEventListener('keyup', function () {
        let slug = this.value
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        document.getElementById('slug').value = slug;

        // Auto meta title if empty
        if (!document.getElementById('meta_title').value) {
            document.getElementById('meta_title').value = this.value;
        }
    });

    // Auto meta description
    document.querySelector('textarea[name="content"]').addEventListener('keyup', function () {
        let content = this.value.replace(/<\/?[^>]+(>|$)/g, "");
        let shortText = content.substring(0, 150);

        if (!document.getElementById('meta_description').value) {
            document.getElementById('meta_description').value = shortText;
        }
    });

    // Prevent double submit
    document.getElementById('blogForm').addEventListener('submit', function () {
        let btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });
</script>