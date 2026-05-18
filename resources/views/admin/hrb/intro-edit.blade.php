{{-- resources/views/admin/hrb/intro-edit.blade.php --}}

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

                    {{-- INTRO FORM --}}
                    <form id="introForm"
                          method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('admin.hrb.intro.update') }}">

                        @csrf

                        {{-- SUB TITLE --}}
                        <div class="form-group">

                            <label>

                                Sub Title

                            </label>

                            <input type="text"
                                   name="intro_sub_title"
                                   class="form-control @error('intro_sub_title') is-invalid @enderror"
                                   value="{{ old('intro_sub_title', $hrb->intro_sub_title ?? '') }}"
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
                                   value="{{ old('intro_heading', $hrb->intro_heading ?? '') }}"
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
                                      placeholder="Enter content">{{ old('intro_content', $hrb->intro_content ?? '') }}</textarea>

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
                                   class="form-control @error('intro_image_1') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                            </small>

                            @error('intro_image_1')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                            @if(!empty($hrb->intro_image_1))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $hrb->intro_image_1) }}"
                                         width="120"
                                         class="img-thumbnail">

                                </div>

                            @endif

                        </div>

                        {{-- IMAGE 2 --}}
                        <div class="form-group mt-3">

                            <label>

                                Image 2

                            </label>

                            <input type="file"
                                   name="intro_image_2"
                                   class="form-control @error('intro_image_2') is-invalid @enderror">

                            <small class="text-muted d-block mt-1">

                                Allowed: JPG, JPEG, PNG, WEBP | Max Size: 2MB

                            </small>

                            @error('intro_image_2')

                                <span class="invalid-feedback d-block">

                                    {{ $message }}

                                </span>

                            @enderror

                            @if(!empty($hrb->intro_image_2))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $hrb->intro_image_2) }}"
                                         width="120"
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

                                Update Introduction

                            </button>

                            <a href="{{ route('admin.hrb.index') }}"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                    <hr class="my-4">

                    {{-- FEATURES --}}
                    <h5 class="mb-3">

                        Introduction Features

                    </h5>

                    {{-- ADD FEATURE --}}
                    <form method="POST"
                          action="{{ route('admin.hrb.intro-feature.store') }}">

                        @csrf

                        <div class="row">

                            {{-- TITLE --}}
                            <div class="col-md-5">

                                <div class="form-group">

                                    <label>

                                        Feature Title

                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           placeholder="Eco Friendly"
                                           value="{{ old('title') }}">

                                    @error('title')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- ICON --}}
                            <div class="col-md-5">

                                <div class="form-group">

                                    <label>

                                        Icon Class

                                    </label>

                                    <input type="text"
                                           name="icon"
                                           class="form-control @error('icon') is-invalid @enderror"
                                           placeholder="fa fa-leaf"
                                           value="{{ old('icon') }}">

                                    @error('icon')

                                        <span class="invalid-feedback d-block">

                                            {{ $message }}

                                        </span>

                                    @enderror

                                </div>

                            </div>

                            {{-- BUTTON --}}
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

                        <table class="table table-bordered">

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

                                @forelse($features ?? [] as $key => $feature)

                                    <tr id="featureRow{{ $feature->id }}">

                                        <td>

                                            {{ $key + 1 }}

                                        </td>

                                        <td>

                                            {{ $feature->title }}

                                        </td>

                                        <td>

                                            @if(!empty($feature->icon))

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

<script>

    // PREVENT DOUBLE SUBMIT
    document.getElementById('introForm').addEventListener('submit', function ()
    {
        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });

    // DELETE FEATURE
    function deleteFeature(id)
    {
        Swal.fire({

            title: 'Delete Feature?',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Yes Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "{{ url('admin/hrb/intro-feature-delete') }}/" + id,

                    type: "DELETE",

                    data: {
                        _token: "{{ csrf_token() }}"
                    },

                    success: function(res) {

                        Swal.fire(
                            'Deleted!',
                            res.message,
                            'success'
                        );

                        $("#featureRow" + id).remove();

                    },

                    error: function() {

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

@include('admin.footer')