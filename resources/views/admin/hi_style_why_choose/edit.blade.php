{{-- resources/views/admin/hi_style_why_choose/edit.blade.php --}}

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

                        <a href="{{ route('admin.hi-style.index') }}">

                            Hi Style Page

                        </a>

                    </li>

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.hi-style-why-choose.index') }}">

                            Why Choose Us

                        </a>

                    </li>

                    <li class="breadcrumb-item active">

                        Edit Item

                    </li>

                </ol>

            </div>

        </div>

        <div class="card shadow-sm">

            <div class="card-header">

                <strong>

                    Edit Item

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

                <form id="itemForm"
                      method="POST"
                      enctype="multipart/form-data"
                      action="{{ route('admin.hi-style-why-choose.update', $item->id) }}">

                    @csrf
                    @method('PUT')

                    {{-- TITLE --}}
                    <div class="form-group">

                        <label>

                            Title

                        </label>

                        <input type="text"
                               name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $item->title) }}"
                               placeholder="Enter title">

                        @error('title')

                            <span class="invalid-feedback d-block">

                                {{ $message }}

                            </span>

                        @enderror

                    </div>

                    {{-- SHORT CONTENT --}}
                    <div class="form-group mt-3">

                        <label>

                            Short Content

                        </label>

                        <textarea name="short_content"
                                  rows="5"
                                  class="form-control @error('short_content') is-invalid @enderror"
                                  placeholder="Enter short content">{{ old('short_content', $item->short_content) }}</textarea>

                        @error('short_content')

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
                               placeholder="fa fa-home"
                               value="{{ old('icon', $item->icon) }}">

                        @error('icon')

                            <span class="invalid-feedback d-block">

                                {{ $message }}

                            </span>

                        @enderror

                    </div>

                    {{-- IMAGE --}}
                    <div class="form-group mt-3">

                        <label>

                            Image

                        </label>

                        <input type="file"
                               name="image"
                               id="image"
                               class="form-control @error('image') is-invalid @enderror">

                        <small class="text-muted d-block mt-1">

                            Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                        </small>

                        @error('image')

                            <span class="invalid-feedback d-block">

                                {{ $message }}

                            </span>

                        @enderror

                        {{-- OLD IMAGE --}}
                        @if($item->image)

                            <div class="mt-3"
                                 id="oldImage">

                                <img src="{{ asset('storage/'.$item->image) }}"
                                     width="100"
                                     class="img-thumbnail">

                            </div>

                        @endif

                        {{-- PREVIEW --}}
                        <div class="mt-3"
                             id="preview"></div>

                    </div>

                    {{-- STATUS --}}
                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input type="checkbox"
                                   name="status"
                                   id="status"
                                   class="custom-control-input"
                                   {{ old('status', $item->status) ? 'checked' : '' }}>

                            <label class="custom-control-label"
                                   for="status">

                                Active

                            </label>

                        </div>

                    </div>

                    {{-- BUTTONS --}}
                    <div class="mt-4">

                        <button type="submit"
                                id="saveBtn"
                                class="btn btn-success">

                            <i class="fa fa-save"></i>

                            Update Item

                        </button>

                        <a href="{{ route('admin.hi-style-why-choose.index') }}"
                           class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

/*
|--------------------------------------------------------------------------
| IMAGE PREVIEW
|--------------------------------------------------------------------------
*/

document.getElementById('image').addEventListener('change', function () {

    let file = this.files[0];

    if (!file) return;

    let reader = new FileReader();

    reader.onload = function (e) {

        document.getElementById('preview').innerHTML =
            `<img src="${e.target.result}"
                  width="120"
                  class="img-thumbnail">`;

        let oldImage = document.getElementById('oldImage');

        if(oldImage){

            oldImage.style.display = 'none';

        }

    };

    reader.readAsDataURL(file);

});


/*
|--------------------------------------------------------------------------
| PREVENT DOUBLE SUBMIT
|--------------------------------------------------------------------------
*/

document.getElementById('itemForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>