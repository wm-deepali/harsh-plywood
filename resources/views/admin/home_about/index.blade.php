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

                    <li class="breadcrumb-item active">

                        Home About Section

                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <!-- MAIN SECTION -->

            <form action="{{ route('admin.home-about.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="card shadow-sm">

                    <div class="card-header">

                        <strong>

                            Manage Home About Section

                        </strong>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <label>
                                    Sub Heading
                                </label>

                                <input type="text"
                                       name="sub_heading"
                                       class="form-control"
                                       value="{{ old('sub_heading', $section->sub_heading ?? '') }}">

                            </div>

                            <div class="col-md-6">

                                <label>
                                    Heading
                                </label>

                                <input type="text"
                                       name="heading"
                                       class="form-control"
                                       value="{{ old('heading', $section->heading ?? '') }}">

                            </div>

                        </div>

                        <div class="form-group mt-3">

                            <label>
                                Description
                            </label>

                            <textarea name="description"
                                      id="editor"
                                      class="form-control">{{ old('description', $section->description ?? '') }}</textarea>

                        </div>

                    
                        <div class="row mt-3">

                            <div class="col-md-6">

                                <label>
                                    Award Title
                                </label>

                                <input type="text"
                                       name="award_title"
                                       class="form-control"
                                       value="{{ old('award_title', $section->award_title ?? '') }}">

                            </div>

                            <div class="col-md-6">

                                <label>
                                    Award Icon
                                </label>

                                <input type="text"
                                       name="award_icon"
                                       class="form-control"
                                       placeholder="fa-regular fa-star"
                                       value="{{ old('award_icon', $section->award_icon ?? '') }}">

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

                            @if(isset($section) && $section->image)

                                <div class="mt-3">

                                    <img src="{{ asset('storage/' . $section->image) }}"
                                         width="180"
                                         class="img-thumbnail">

                                </div>

                            @endif

                        </div>

                        <button type="submit"
                                class="btn btn-primary mt-4">

                            Update Section

                        </button>

                    </div>

                </div>

            </form>

            <!-- FEATURES -->

            <div class="card shadow-sm mt-4">

                <div class="card-header">

                    <strong>

                        Manage Features

                    </strong>

                </div>

                <div class="card-body">

                    <!-- ADD -->

                    <form action="{{ route('admin.home-about.feature.store') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-5">

                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Feature Title"
                                       required>

                            </div>

                            <div class="col-md-5">

                                <input type="text"
                                       name="icon"
                                       class="form-control"
                                       placeholder="fa-solid fa-screwdriver-wrench">

                            </div>

                            <div class="col-md-2">

                                <button type="submit"
                                        class="btn btn-primary w-100">

                                    Add

                                </button>

                            </div>

                        </div>

                    </form>

                    <!-- LIST -->

                    <div class="table-responsive mt-4">

                        <table class="table table-bordered">

                            <thead>

                                <tr>

                                    <th width="80">
                                        ID
                                    </th>

                                    <th>
                                        Icon
                                    </th>

                                    <th>
                                        Title
                                    </th>

                                    <th width="120">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($features as $feature)

                                    <tr id="featureRow{{ $feature->id }}">

                                        <td>

                                            {{ $feature->id }}

                                        </td>

                                        <td>

                                            <i class="{{ $feature->icon }}"></i>

                                            {{ $feature->icon }}

                                        </td>

                                        <td>

                                            {{ $feature->title }}

                                        </td>

                                        <td>

                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
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

<script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

<script>

    CKEDITOR.replace('editor');

    function deleteFeature(id)
    {
        Swal.fire({

            title: 'Delete Feature?',

            icon: 'warning',

            showCancelButton: true

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: '/admin/home-about/feature/delete/' + id,

                    type: 'DELETE',

                    data: {

                        _token: '{{ csrf_token() }}'

                    },

                    success: function (response) {

                        $('#featureRow' + id).remove();

                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        );

                    }

                });

            }

        });
    }

</script>