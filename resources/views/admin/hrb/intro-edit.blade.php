{{-- resources/views/admin/hrb/intro-edit.blade.php --}}

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
                    <strong>Edit Introduction Section</strong>
                </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.hrb.intro.update') }}">

                        @csrf

                        <div class="form-group">

                            <label>Sub Title</label>

                            <input type="text" name="intro_sub_title" class="form-control"
                                value="{{ old('intro_sub_title', $hrb->intro_sub_title ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Heading</label>

                            <input type="text" name="intro_heading" class="form-control"
                                value="{{ old('intro_heading', $hrb->intro_heading ?? '') }}">

                        </div>

                        <div class="form-group mt-3">

                            <label>Content</label>

                            <textarea name="intro_content" rows="6"
                                class="form-control">{{ old('intro_content', $hrb->intro_content ?? '') }}</textarea>

                        </div>

                        <div class="form-group mt-3">

                            <label>Image 1</label>

                            <input type="file" name="intro_image_1" class="form-control">

                            @if(!empty($hrb->intro_image_1))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $hrb->intro_image_1) }}" width="120">

                                </div>

                            @endif

                        </div>

                        <div class="form-group mt-3">

                            <label>Image 2</label>

                            <input type="file" name="intro_image_2" class="form-control">

                            @if(!empty($hrb->intro_image_2))

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $hrb->intro_image_2) }}" width="120">

                                </div>

                            @endif

                        </div>

                        <div class="mt-4">

                            <button type="submit" class="btn btn-success">

                                Update Introduction

                            </button>

                            <a href="{{ route('admin.hrb.index') }}" class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                    <hr class="my-4">

                    <h5 class="mb-3">
                        Introduction Features
                    </h5>

                    {{-- ADD FEATURE FORM --}}
                    <form method="POST" action="{{ route('admin.hrb.intro-feature.store') }}">

                        @csrf

                        <div class="row">

                            <div class="col-md-5">

                                <div class="form-group">

                                    <label>Feature Title</label>

                                    <input type="text" name="title" class="form-control" placeholder="Eco Friendly">

                                </div>

                            </div>

                            <div class="col-md-5">

                                <div class="form-group">

                                    <label>Icon Class</label>

                                    <input type="text" name="icon" class="form-control" placeholder="fa fa-leaf">

                                </div>

                            </div>

                            <div class="col-md-2 d-flex align-items-end">

                                <button type="submit" class="btn btn-primary w-100">

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

                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteFeature({{ $feature->id }})">

                                                Delete

                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4" class="text-center">

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

    function deleteFeature(id) {
        Swal.fire({

            title: 'Delete Feature?',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Yes Delete'

        })

            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/hrb/intro-feature-delete') }}/" + id,

                        type: "DELETE",

                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function (res) {

                            $("#featureRow" + id).remove();

                        }

                    });

                }

            });
    }

</script>
@include('admin.footer')