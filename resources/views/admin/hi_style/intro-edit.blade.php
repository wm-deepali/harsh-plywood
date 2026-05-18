{{-- resources/views/admin/hi_style/intro-edit.blade.php --}}

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

                    <li class="breadcrumb-item active">

                        Introduction Section

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">

                    <strong>

                        Edit Introduction Section

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

                    <form id="introForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.hi-style.intro.update') }}">

                        @csrf

                        {{-- SUB TITLE --}}
                        <div class="form-group">

                            <label>

                                Sub Title

                            </label>

                            <input type="text"
                                   name="intro_sub_title"
                                   class="form-control @error('intro_sub_title') is-invalid @enderror"
                                   value="{{ old('intro_sub_title', $hi_style->intro_sub_title ?? '') }}"
                                   placeholder="Enter sub title">

                            @error('intro_sub_title')

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
                                   name="intro_heading"
                                   class="form-control @error('intro_heading') is-invalid @enderror"
                                   value="{{ old('intro_heading', $hi_style->intro_heading ?? '') }}"
                                   placeholder="Enter heading">

                            @error('intro_heading')

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

                            <textarea name="intro_content"
                                      rows="6"
                                      class="form-control @error('intro_content') is-invalid @enderror"
                                      placeholder="Enter content">{{ old('intro_content', $hi_style->intro_content ?? '') }}</textarea>

                            @error('intro_content')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                        </div>

                        {{-- IMAGE 1 --}}
                        <div class="form-group mt-3">

                            <label>

                                Image 1

                            </label>

                            <input type="file"
                                   name="intro_image_1"
                                   id="intro_image_1"
                                   class="form-control @error('intro_image_1') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                            </small>

                            @error('intro_image_1')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                            {{-- OLD IMAGE --}}
                            @if(!empty($hi_style->intro_image_1))

                                <div class="mt-3"
                                     id="oldImage1">

                                    <img src="{{ asset('storage/' . $hi_style->intro_image_1) }}"
                                         width="120"
                                         class="img-thumbnail">

                                </div>

                            @endif

                            {{-- PREVIEW --}}
                            <div class="mt-3"
                                 id="preview1"></div>

                        </div>

                        {{-- IMAGE 2 --}}
                        <div class="form-group mt-3">

                            <label>

                                Image 2

                            </label>

                            <input type="file"
                                   name="intro_image_2"
                                   id="intro_image_2"
                                   class="form-control @error('intro_image_2') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                            </small>

                            @error('intro_image_2')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                            {{-- OLD IMAGE --}}
                            @if(!empty($hi_style->intro_image_2))

                                <div class="mt-3"
                                     id="oldImage2">

                                    <img src="{{ asset('storage/' . $hi_style->intro_image_2) }}"
                                         width="120"
                                         class="img-thumbnail">

                                </div>

                            @endif

                            {{-- PREVIEW --}}
                            <div class="mt-3"
                                 id="preview2"></div>

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-4">

                            <button type="submit"
                                    id="saveBtn"
                                    class="btn btn-success">

                                <i class="fa fa-save"></i>

                                Update Introduction

                            </button>

                            <a href="{{ route('admin.hi-style.index') }}"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                    <hr class="my-4">

                    <h5 class="mb-3">

                        Introduction Features

                    </h5>

                    {{-- ADD FEATURE FORM --}}
                    <form method="POST"
                          action="{{ route('admin.hi-style.intro-feature.store') }}">

                        @csrf

                        <div class="row">

                            <div class="col-md-5">

                                <div class="form-group">

                                    <label>

                                        Feature Title

                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           placeholder="Eco Friendly">

                                </div>

                            </div>

                            <div class="col-md-5">

                                <div class="form-group">

                                    <label>

                                        Icon Class

                                    </label>

                                    <input type="text"
                                           name="icon"
                                           class="form-control"
                                           placeholder="fa fa-leaf">

                                </div>

                            </div>

                            <div class="col-md-2 d-flex align-items-end">

                                <button type="submit"
                                        class="btn btn-primary w-100">

                                    Add

                                </button>

                            </div>

                        </div>

                    </form>

                    {{-- FEATURES TABLE --}}
                    <div class="table-responsive mt-4">

                        <table class="table table-bordered table-hover">

                            <thead class="thead-light">

                                <tr>

                                    <th width="80">

                                        #

                                    </th>

                                    <th>

                                        Title

                                    </th>

                                    <th>

                                        Icon

                                    </th>

                                    <th width="100">

                                        Action

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($features as $key => $feature)

                                    <tr id="featureRow{{ $feature->id }}">

                                        <td>

                                            {{ $key + 1 }}

                                        </td>

                                        <td>

                                            {{ $feature->title }}

                                        </td>

                                        <td>

                                            @if($feature->icon)

                                                <i class="{{ $feature->icon }}"></i>

                                                {{ $feature->icon }}

                                            @endif

                                        </td>

                                        <td>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="deleteFeature({{ $feature->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center">

                                            No Features Added

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

/*
|--------------------------------------------------------------------------
| IMAGE 1 PREVIEW
|--------------------------------------------------------------------------
*/

document.getElementById('intro_image_1').addEventListener('change', function () {

    let file = this.files[0];

    if (!file) return;

    let reader = new FileReader();

    reader.onload = function (e) {

        document.getElementById('preview1').innerHTML =
            `<img src="${e.target.result}"
                  width="120"
                  class="img-thumbnail">`;

        let oldImage = document.getElementById('oldImage1');

        if(oldImage){

            oldImage.style.display = 'none';

        }

    };

    reader.readAsDataURL(file);

});


/*
|--------------------------------------------------------------------------
| IMAGE 2 PREVIEW
|--------------------------------------------------------------------------
*/

document.getElementById('intro_image_2').addEventListener('change', function () {

    let file = this.files[0];

    if (!file) return;

    let reader = new FileReader();

    reader.onload = function (e) {

        document.getElementById('preview2').innerHTML =
            `<img src="${e.target.result}"
                  width="120"
                  class="img-thumbnail">`;

        let oldImage = document.getElementById('oldImage2');

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

document.getElementById('introForm').addEventListener('submit', function () {

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Updating...';

});


/*
|--------------------------------------------------------------------------
| DELETE FEATURE
|--------------------------------------------------------------------------
*/

function deleteFeature(id) {

    Swal.fire({

        title: 'Delete Feature?',

        text: "This action cannot be undone.",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#d33',

        confirmButtonText: 'Yes Delete'

    })

    .then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "{{ url('admin/hi_style/intro-feature-delete') }}/" + id,

                type: "DELETE",

                data: {
                    _token: "{{ csrf_token() }}"
                },

                success: function (res) {

                    Swal.fire(
                        'Deleted!',
                        'Feature deleted successfully.',
                        'success'
                    );

                    $("#featureRow" + id).remove();

                },

                error: function () {

                    Swal.fire(
                        'Error!',
                        'Something went wrong.',
                        'error'
                    );

                }

            });

        }

    });
}

</script>