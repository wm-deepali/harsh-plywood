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
                <a href="{{ route('admin.product-categories.index') }}">Manage Categories</a>
            </li>
            <li class="breadcrumb-item active">
                Edit Category
            </li>
        </ol>
    </div>
</div>

<div class="content-wrapper pb-4">

<div class="card shadow-sm">

<div class="card-header">
    <strong>Edit Category</strong>
</div>

<div class="card-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="categoryForm"
      method="POST"
      enctype="multipart/form-data"
      action="{{ route('admin.product-categories.update', $category->id) }}">

@csrf
@method('PUT')

<div class="form-group">
    <label>Category Name *</label>

    <input type="text"
           name="name"
           id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $category->name) }}"
           required>

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">
    <label>Slug</label>

    <input type="text"
           name="slug"
           id="slug"
           class="form-control @error('slug') is-invalid @enderror"
           value="{{ old('slug', $category->slug) }}">

    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">
    <label>Heading</label>

    <input type="text"
           name="heading"
           class="form-control @error('heading') is-invalid @enderror"
           value="{{ old('heading', $category->heading) }}">

    @error('heading')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">
    <label>Sub Heading</label>

    <input type="text"
           name="sub_heading"
           class="form-control @error('sub_heading') is-invalid @enderror"
           value="{{ old('sub_heading', $category->sub_heading) }}">

    @error('sub_heading')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">
    <label>Short Description</label>

    <textarea name="short_description"
              class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $category->short_description) }}</textarea>

    @error('short_description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">
    <label>Category Image</label>

    <input type="file"
           name="image"
           class="form-control @error('image') is-invalid @enderror">

    @error('image')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    @if($category->image)

        <img src="{{ asset('storage/' . $category->image) }}"
             width="120"
             class="mt-2 border rounded">

    @endif
</div>

<hr class="mt-4">

<h5>SEO Settings</h5>

<div class="form-group mt-3">
    <label>Meta Title</label>

    <input type="text"
           name="meta_title"
           class="form-control @error('meta_title') is-invalid @enderror"
           value="{{ old('meta_title', $category->meta_title) }}">

    @error('meta_title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">
    <label>Meta Description</label>

    <textarea name="meta_description"
              class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $category->meta_description) }}</textarea>

    @error('meta_description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group mt-3">

    <div class="custom-control custom-checkbox">

        <input type="checkbox"
               name="status"
               id="status"
               class="custom-control-input"
               {{ $category->status ? 'checked' : '' }}>

        <label class="custom-control-label" for="status">
            Active
        </label>

    </div>

</div>

<div class="mt-4">

    <button type="submit"
            id="saveBtn"
            class="btn btn-success">

        Update Category

    </button>

    <a href="{{ route('admin.product-categories.index') }}"
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

document.getElementById('name').addEventListener('keyup', function () {

    let slug = this.value
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');

    document.getElementById('slug').value = slug;

});

document.getElementById('categoryForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML = 'Updating...';

});

</script>