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
                        Why Choose Us
                    </li>

                </ol>

            </div>

        </div>

        <div class="content-wrapper pb-4">

            <!-- SECTION FORM -->

            <form action="{{ route('admin.why-choose.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white">

                        <strong>
                            Manage Why Choose Section
                        </strong>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Sub Heading
                                </label>

                                <input type="text"
                                       name="sub_heading"
                                       class="form-control"
                                       value="{{ old('sub_heading', $section->sub_heading ?? '') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Heading
                                </label>

                                <input type="text"
                                       name="heading"
                                       class="form-control"
                                       value="{{ old('heading', $section->heading ?? '') }}">

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="5"
                                      class="form-control">{{ old('description', $section->description ?? '') }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Main Image
                                </label>

                                <input type="file"
                                       name="main_image"
                                       class="form-control">

                                <small class="text-muted">
                                    Allowed: jpg, jpeg, png, webp | Max: 2MB
                                </small>

                                @if(isset($section) && $section->main_image)

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $section->main_image) }}"
                                             class="img-thumbnail"
                                             width="180">

                                    </div>

                                @endif

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Small Image
                                </label>

                                <input type="file"
                                       name="small_image"
                                       class="form-control">

                                <small class="text-muted">
                                    Allowed: jpg, jpeg, png, webp | Max: 2MB
                                </small>

                                @if(isset($section) && $section->small_image)

                                    <div class="mt-3">

                                        <img src="{{ asset('storage/' . $section->small_image) }}"
                                             class="img-thumbnail"
                                             width="180">

                                    </div>

                                @endif

                            </div>

                        </div>

                        <button type="submit"
                                class="btn btn-primary mt-3">

                            Update Section

                        </button>

                    </div>

                </div>

            </form>

            <!-- FEATURES -->

            <div class="card shadow-sm border-0 mt-4">

                <div class="card-header bg-white d-flex justify-content-between align-items-center">

                    <strong>
                        Manage Features
                    </strong>

                    <button type="button"
                            class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#addFeatureModal">

                        Add Feature

                    </button>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th width="80">
                                        ID
                                    </th>

                                    <th>
                                        Position
                                    </th>

                                    <th>
                                        Icon
                                    </th>

                                    <th>
                                        Title
                                    </th>

                                    <th>
                                        Description
                                    </th>

                                    <th width="180">
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
                                            {{ ucfirst($feature->position) }}
                                        </td>

                                        <td>

                                            <i class="{{ $feature->icon }}"></i>

                                            <span class="ms-2">
                                                {{ $feature->icon }}
                                            </span>

                                        </td>

                                        <td>
                                            {{ $feature->title }}
                                        </td>

                                        <td>
                                            {{ $feature->description }}
                                        </td>

                                        <td>

                                            <div class="d-flex gap-2">

                                                <button type="button"
                                                        class="btn btn-info btn-sm text-white"
                                                        data-toggle="modal"
                                                        data-target="#editFeatureModal{{ $feature->id }}">

                                                    Edit

                                                </button>

                                                <button type="button"
                                                        class="btn btn-danger btn-sm"
                                                        style="margin-left:10px;"
                                                        onclick="deleteFeature({{ $feature->id }})">

                                                    Delete

                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                    <!-- EDIT FEATURE MODAL -->

                                    <div class="modal fade"
                                         id="editFeatureModal{{ $feature->id }}"
                                         tabindex="-1">

                                        <div class="modal-dialog modal-lg">

                                            <div class="modal-content">

                                                <form action="{{ route('admin.why-choose.feature.update', $feature->id) }}"
                                                      method="POST">

                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-header">

                                                        <h5 class="modal-title">
                                                            Edit Feature
                                                        </h5>

                                                       <button type="button"
        class="close"
        data-dismiss="modal">

    <span>&times;</span>

</button>

                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row">

                                                            <div class="col-md-6 mb-3">

                                                                <label class="form-label">
                                                                    Position
                                                                </label>

                                                                <select name="position"
                                                                        class="form-control">

                                                                    <option value="left"
                                                                        {{ $feature->position == 'left' ? 'selected' : '' }}>
                                                                        Left
                                                                    </option>

                                                                    <option value="right"
                                                                        {{ $feature->position == 'right' ? 'selected' : '' }}>
                                                                        Right
                                                                    </option>

                                                                </select>

                                                            </div>

                                                            <div class="col-md-6 mb-3">

                                                                <label class="form-label">
                                                                    Icon Class
                                                                </label>

                                                                <input type="text"
                                                                       name="icon"
                                                                       class="form-control"
                                                                       value="{{ $feature->icon }}">

                                                            </div>

                                                            <div class="col-md-12 mb-3">

                                                                <label class="form-label">
                                                                    Title
                                                                </label>

                                                                <input type="text"
                                                                       name="title"
                                                                       class="form-control"
                                                                       value="{{ $feature->title }}"
                                                                       required>

                                                            </div>

                                                            <div class="col-md-12">

                                                                <label class="form-label">
                                                                    Description
                                                                </label>

                                                                <textarea name="description"
                                                                          rows="4"
                                                                          class="form-control">{{ $feature->description }}</textarea>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">

                                                        <button type="submit"
                                                                class="btn btn-primary">

                                                            Update Feature

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <tr>

                                        <td colspan="6"
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

<!-- ADD FEATURE MODAL -->

<div class="modal fade"
     id="addFeatureModal"
     tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="{{ route('admin.why-choose.feature.store') }}"
                  method="POST">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Feature
                    </h5>

                  <button type="button"
        class="close"
        data-dismiss="modal">

    <span>&times;</span>

</button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Position
                            </label>

                            <select name="position"
                                    class="form-control"
                                    required>

                                <option value="left">
                                    Left
                                </option>

                                <option value="right">
                                    Right
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Icon Class
                            </label>

                            <input type="text"
                                   name="icon"
                                   class="form-control"
                                   placeholder="fa-solid fa-medal">

                        </div>

                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Title
                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="col-md-12">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control"></textarea>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        Save Feature

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@include('admin.footer')

<script>

    function deleteFeature(id)
    {
        Swal.fire({

            title: 'Delete Feature?',

            text: "This action cannot be undone.",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            confirmButtonText: 'Yes, Delete'

        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: '/admin/why-choose/feature/delete/' + id,

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